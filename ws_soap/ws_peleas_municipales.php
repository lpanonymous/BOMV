<?php
	include_once 'lib/nusoap.php';
	$servicio = new soap_server();
	$ns = "urn:miserviciowsdl";
	$servicio->configureWSDL("ServicioWeb-BOX", $ns);
	$servicio->schemaTargetBamespace = $ns;
	
	//Peleas_Municipales
	$servicio->register("agregarPeleaMunicipal", array('id' => 'xsd:string', 'categoria' => 'xsd:string', 'id_juez1' => 'xsd:string', 'id_juez2' => 'xsd:string', 'id_juez3' => 'xsd:string', 'id_juez4' => 'xsd:string', 'id_boxeador1' => 'xsd:string', 'id_boxeador2' => 'xsd:string', 'fecha' => 'xsd:string', 'hora' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register("editarPeleaMunicipal", array('id' => 'xsd:string', 'categoria' => 'xsd:string', 'id_juez1' => 'xsd:string', 'id_juez2' => 'xsd:string', 'id_juez3' => 'xsd:string', 'id_juez4' => 'xsd:string', 'id_boxeador1' => 'xsd:string', 'id_boxeador2' => 'xsd:string', 'fecha' => 'xsd:string', 'hora' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register("eliminarPeleaMunicipal", array('id' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register('buscarPeleaMunicipal',array('id' => 'xsd:string'), array('return' => 'xsd:string'),$ns);
	$servicio->register('mostrarPeleaMunicipal', array(), array('return' => 'xsd:string'), $ns);


	function buscarPeleaMunicipal($id) 
	{
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");	
		$sql = "SELECT * FROM peleas_municipios_categoria_varonil where id='$id'";
		$resultado = mysqli_query($conexion, $sql);

		while ($fila = mysqli_fetch_array($resultado))
		{
			$datos = array("id" => $fila['id'], "categoria" => $fila['categoria'], "id_juez1" => $fila['id_juez1'], "id_juez2" => $fila['id_juez2'], "id_juez3" => $fila['id_juez3'], "id_juez4" => $fila['id_juez4'], "id_boxeador1" => $fila['id_boxeador1'], "id_boxeador2" => $fila['id_boxeador2'], "fecha" => $fila['fecha'], "hora" => $fila['hora']);	
		}
		mysqli_close($conexion);
		$datos2 = implode("<", $datos);

		return $datos2;

	}

	function agregarPeleaMunicipal($id, $categoria, $id_juez1, $id_juez2, $id_juez3, $id_juez4, $id_boxeador1, $id_boxeador2, $fecha, $hora){
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		
		$agregar = $conexion->query("INSERT INTO peleas_municipios_categoria_varonil(id, categoria, id_juez1, id_juez2, id_juez3, id_juez4, id_boxeador1, id_boxeador2, fecha, hora) VALUES ('$id', '$categoria', '$id_juez1', '$id_juez2', '$id_juez3', '$id_juez4', '$id_boxeador1', '$id_boxeador2', '$fecha', '$hora')");
		$resultado=mysqli_query($conexion, $agregar);
		if(!$conexion) {
			return "Error en la conexion";
			exit();
		}
		return "Registro insertado";
		mysqli_close($conexion);
	}

	function editarPeleaMunicipal($id, $categoria, $id_juez1, $id_juez2, $id_juez3, $id_juez4, $id_boxeador1, $id_boxeador2, $fecha, $hora){
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		$editar = $conexion->query("UPDATE peleas_municipios_categoria_varonil SET categoria='$categoria',id_juez1='$id_juez1',id_juez2='$id_juez2',id_juez3='$id_juez3',id_juez4='$id_juez4',id_boxeador1='$id_boxeador1', id_boxeador2='$id_boxeador2',fecha='$fecha', hora='$hora'  WHERE id='$id'");
		$resultado=mysqli_query($conexion, $editar);

		if(!$conexion) {
			return "Error en la conexion";
			exit();
		}
		return "Registro actualizado";
		mysqli_close($conexion);
	}

	function eliminarPeleaMunicipal($id) {
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		$eliminar = "DELETE FROM peleas_municipios_categoria_varonil WHERE id='$id'";
		$resultado=mysqli_query($conexion, $eliminar);

		if(!$conexion) {
			return "Error en la conexion";
			exit();
		}
		return "Registro eliminado";
		mysqli_close($conexion);
	}

	function mostrarPeleaMunicipal() 
	{
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		$sql = "SELECT * FROM peleas_municipios_categoria_varonil";
		$resultado = mysqli_query($conexion, $sql);
		//categoria, id_juez1, id_juez2, id_juez3, id_juez4, id_boxeador1, id_boxeador2, fecha, hora
		$listado = "<div class='opacity'><table table-responsive{-sm|-md|-lg|-xl} class='table table-bordered table-striped table-dark' ><thead><tr><th>ID</th><th>Categoria</th><th>Id juez1</th><th>Id juez2</th><th>Id juez3</th><th>Id juez4</th><th>Id boxeador1</th><th>Id boxeador2</th><th>Fecha</th><th>Hora</th><th>Funciones</th></tr></thead><tbody>";
		while ($fila = mysqli_fetch_array($resultado)){
				$listado = $listado."<tr><td>".$fila['id']."</td><td>".$fila['categoria']
				."</td><td>".$fila['id_juez1']."</td><td>".$fila['id_juez2']."</td><td>".$fila['id_juez3']."</td><td>".$fila['id_juez4']
				."</td><td>".$fila['id_boxeador1']."</td><td>".$fila['id_boxeador2']."</td><td>".$fila['fecha']
				."</td><td>".$fila['hora']."</td><td>
				<a href='../controllers/soap_clients/cliente_peleas_municipales_leer.php?id=". $fila['id'] ."' title='View Record' data-toggle='tooltip'><span class='fa fa-eye'></span></a>
				<a href='../controllers/soap_clients/cliente_peleas_municipales_actualizar.php?id=". $fila['id'] ."' title='Update Record' data-toggle='tooltip'><span class='fa fa-pencil'></span></a>
				<a href='../controllers/soap_clients/cliente_peleas_municipales_elimina.php?id=". $fila['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='fa fa-trash'></span></a>
				</td></tr>";
		}
		$listado = $listado."</tbody></table></div>";
		mysqli_close($conexion);

		return new soapval('return', 'xsd:string', $listado);

	}

	$servicio->service(file_get_contents("php://input"));
?>