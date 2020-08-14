<?php
	include_once 'lib/nusoap.php';
	$servicio = new soap_server();
	$ns = "urn:miserviciowsdl";
	$servicio->configureWSDL("ServicioWeb-BOX", $ns);
	$servicio->schemaTargetBamespace = $ns;
	
	//Peleas_Estatales
	$servicio->register('buscarPeleaMunicipal',array('id' => 'xsd:string'), array('return' => 'xsd:string'),$ns);
	$servicio->register("agregarPeleaMunicipal", array('categoria' => 'xsd:string', 'division' => 'xsd:string','id_juez1' => 'xsd:string', 'id_juez2' => 'xsd:string', 'id_juez3' => 'xsd:string', 'id_juez4' => 'xsd:string', 'id_boxeador1' => 'xsd:string', 'id_boxeador2' => 'xsd:string', 'fecha' => 'xsd:string', 'hora' => 'xsd:string', 'ganador' => 'xsd:string', 'foto' => 'xsd:string', 'nombre_foto' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register("editarPeleaMunicipal", array('id', 'categoria' => 'xsd:string', 'division' => 'xsd:string','id_juez1' => 'xsd:string', 'id_juez2' => 'xsd:string', 'id_juez3' => 'xsd:string', 'id_juez4' => 'xsd:string', 'id_boxeador1' => 'xsd:string', 'id_boxeador2' => 'xsd:string', 'fecha' => 'xsd:string', 'hora' => 'xsd:string', 'ganador' => 'xsd:string','foto' => 'xsd:string', 'nombre_foto' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register("eliminarPeleaMunicipal", array('id' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register('mostrarPeleaMunicipal', array(), array('return' => 'xsd:string'), $ns);

	function buscarPeleaMunicipal($id) 
	{
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");	
		$sql = "SELECT * FROM peleas_municipales where id='$id'";
		$resultado = mysqli_query($conexion, $sql);

		while ($fila = mysqli_fetch_array($resultado))
		{
			$datos = array("id" => $fila['id'], "categoria" => $fila['categoria'], "division" => $fila['division'],"id_juez1" => $fila['id_juez1'], "id_juez2" => $fila['id_juez2'], "id_juez3" => $fila['id_juez3'], "id_juez4" => $fila['id_juez4'], "id_boxeador1" => $fila['id_boxeador1'], "id_boxeador2" => $fila['id_boxeador2'], "fecha" => $fila['fecha'], "hora" => $fila['hora'], "ganador" => $fila['ganador'], "nombre_foto"=> $fila['nombre_foto']);	
		}
		/*mysqli_close($conexion);
		$datos2 = implode("<", $datos);
		return $datos2;*/
		$juezJSON=json_encode($datos);
		$juezJSON2=json_decode($juezJSON, true);
		$data = serialize($juezJSON2);
		return $data;
	}

	function agregarPeleaMunicipal($categoria, $division, $id_juez1, $id_juez2, $id_juez3, $id_juez4, $id_boxeador1, $id_boxeador2, $fecha, $hora, $ganador, $foto, $nombre_foto){
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		$location = "..\\..\\resources\\images\\peleas_municipales\\".$nombre_foto;                               // Mention where to upload the file
        $current = file_get_contents($location);                     // Get the file content. This will create an empty file if the file does not exist     
        $current = base64_decode($foto);                          // Now decode the content which was sent by the client     
        file_put_contents($location, $current);                      // Write the decoded content in the file mentioned at particular location      
		$agregar = $conexion->query("INSERT INTO peleas_municipales(categoria, division, id_juez1, id_juez2, id_juez3, id_juez4, id_boxeador1, id_boxeador2, fecha, hora, ganador, nombre_foto) VALUES ('$categoria', '$division','$id_juez1', '$id_juez2', '$id_juez3', '$id_juez4', '$id_boxeador1', '$id_boxeador2', '$fecha', '$hora', '$ganador', '$nombre_foto')");
		$resultado=mysqli_query($conexion, $agregar);
		if(!$conexion) {
			return "Error en la conexion";
			exit();
		}
		return "Registro insertado";
		mysqli_close($conexion);
	}

	function editarPeleaMunicipal($id, $categoria, $division, $id_juez1, $id_juez2, $id_juez3, $id_juez4, $id_boxeador1, $id_boxeador2, $fecha, $hora, $ganador, $foto, $nombre_foto){
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		$location = "..\\..\\resources\\images\\peleas_municipales\\".$nombre_foto;                               // Mention where to upload the file
        $current = file_get_contents($location);                     // Get the file content. This will create an empty file if the file does not exist     
        $current = base64_decode($foto);                          // Now decode the content which was sent by the client     
        file_put_contents($location, $current);                      // Write the decoded content in the file mentioned at particular location      
		$editar = $conexion->query("UPDATE peleas_municipales SET categoria='$categoria',division='$division',id_juez1='$id_juez1',id_juez2='$id_juez2',id_juez3='$id_juez3',id_juez4='$id_juez4',id_boxeador1='$id_boxeador1', id_boxeador2='$id_boxeador2',fecha='$fecha', hora='$hora', ganador='$ganador', nombre_foto='$nombre_foto' WHERE id='$id'");
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
		$eliminar = "DELETE FROM peleas_municipales WHERE id='$id'";
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
		$sql = "SELECT * FROM peleas_municipales";
		$resultado = mysqli_query($conexion, $sql);
		//categoria, id_juez1, id_juez2, id_juez3, id_juez4, id_boxeador1, id_boxeador2, fecha, hora
		$listado = "<div class='opacity table-responsive' id='div1'><table table-responsive{-sm|-md|-lg|-xl} class='table table-bordered table-striped table-dark' id='myTable'><thead><tr><th>Id</th><th>Foto</th><th>Categoría</th><th>División</th><th>Juez 1</th><th>Juez 2</th><th>Juez 3</th><th>Juez 4</th><th>Boxeador 1</th><th>Boxeador 2</th><th>Fecha</th><th>Hora</th><th>Ganador</th><th>Funciones</th></tr></thead><tbody>";
		while ($fila = mysqli_fetch_array($resultado)){
				$listado = $listado."<tr><td>".$fila['id']."</td><td><img src='../../resources/images/peleas_municipales/".$fila['nombre_foto']."' width='75' height='75' style= 'border-radius: 50%;'/>"."</td><td>".$fila['categoria']."</td><td>".$fila['division']
				."</td><td>".$fila['id_juez1']."</td><td>".$fila['id_juez2']."</td><td>".$fila['id_juez3']."</td><td>".$fila['id_juez4']
				."</td><td>".$fila['id_boxeador1']."</td><td>".$fila['id_boxeador2']."</td><td>".date("d/m/Y", strtotime($fila['fecha']))."</td><td>".date("H:i", strtotime($fila['hora']))."</td><td>".$fila['ganador']."</td><td>
				<a href='../../controllers/soap_clients/cliente_peleas_municipales_leer.php?id=". $fila['id'] ."' title='View Record' data-toggle='tooltip'><span class='fa fa-eye'></span></a>
				<a href='../../controllers/soap_clients/cliente_peleas_municipales_actualizar.php?id=". $fila['id'] ."' title='Update Record' data-toggle='tooltip'><span class='fa fa-pencil'></span></a>
				<a href='../../controllers/soap_clients/cliente_peleas_municipales_elimina.php?id=". $fila['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='fa fa-trash'></span></a>
				</td></tr>";
		}
		$listado = $listado."</tbody></table></div>";
		mysqli_close($conexion);

		return new soapval('return', 'xsd:string', $listado);

	}

	$servicio->service(file_get_contents("php://input"));
?>