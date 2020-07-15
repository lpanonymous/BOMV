<?php
	include_once 'lib/nusoap.php';
	$servicio = new soap_server();
	$ns = "urn:miserviciowsdl";
	$servicio->configureWSDL("ServicioWeb-BOX", $ns);
	$servicio->schemaTargetBamespace = $ns;
	
	//Peleas_Estatales
	$servicio->register("agregarPeleaEstatal", array('id' => 'xsd:string', 'categoria' => 'xsd:string', 'id_juez1' => 'xsd:string', 'id_juez2' => 'xsd:string', 'id_juez3' => 'xsd:string', 'id_juez4' => 'xsd:string', 'id_boxeador1' => 'xsd:string', 'id_boxeador2' => 'xsd:string', 'fecha' => 'xsd:string', 'hora' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register("editarPeleaEstatal", array('id' => 'xsd:string', 'categoria' => 'xsd:string', 'id_juez1' => 'xsd:string', 'id_juez2' => 'xsd:string', 'id_juez3' => 'xsd:string', 'id_juez4' => 'xsd:string', 'id_boxeador1' => 'xsd:string', 'id_boxeador2' => 'xsd:string', 'fecha' => 'xsd:string', 'hora' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register("eliminarPeleaEstatal", array('id' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register('buscarPeleaEstatal',array('id' => 'xsd:string'), array('return' => 'xsd:string'),$ns);
	$servicio->register('mostrarPeleaEstatal', array(), array('return' => 'xsd:string'), $ns);

	//Resultados de peleas estatales
	$servicio->register("agregarResultadoPeleaEstatal", array('id' => 'xsd:string', 'idb1' => 'xsd:string', 'idb2' => 'xsd:string', 'peso' => 'xsd:string', 'idganador' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register("editarResultadoPeleaEstatal", array('id' => 'xsd:string', 'idb1' => 'xsd:string', 'idb2' => 'xsd:string', 'peso' => 'xsd:string', 'idganador' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register("eliminarResultadoPeleaEstatal", array('id' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register('buscarResultadoPeleaEstatal',array('id' => 'xsd:string'), array('return' => 'xsd:string'),$ns);
	$servicio->register('mostrarResultadoPeleaEstatal', array(), array('return' => 'xsd:string'), $ns);


	function buscarPeleaEstatal($id) 
	{
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");	
		$sql = "SELECT * FROM peleas_estatales_categoria_varonil where id='$id'";
		$resultado = mysqli_query($conexion, $sql);

		while ($fila = mysqli_fetch_array($resultado))
		{
			$datos = array("id" => $fila['id'], "categoria" => $fila['categoria'], "id_juez1" => $fila['id_juez1'], "id_juez2" => $fila['id_juez2'], "id_juez3" => $fila['id_juez3'], "id_juez4" => $fila['id_juez4'], "id_boxeador1" => $fila['id_boxeador1'], "id_boxeador2" => $fila['id_boxeador2'], "fecha" => $fila['fecha'], "hora" => $fila['hora']);	
		}
		mysqli_close($conexion);
		$datos2 = implode("<", $datos);

		return $datos2;

	}

	function agregarPeleaEstatal($id, $categoria, $id_juez1, $id_juez2, $id_juez3, $id_juez4, $id_boxeador1, $id_boxeador2, $fecha, $hora){
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		
		$agregar = $conexion->query("INSERT INTO peleas_estatales_categoria_varonil(id, categoria, id_juez1, id_juez2, id_juez3, id_juez4, id_boxeador1, id_boxeador2, fecha, hora) VALUES ('$id', '$categoria', '$id_juez1', '$id_juez2', '$id_juez3', '$id_juez4', '$id_boxeador1', '$id_boxeador2', '$fecha', '$hora')");
		$resultado=mysqli_query($conexion, $agregar);
		if(!$conexion) {
			return "Error en la conexion";
			exit();
		}
		return "Registro insertado";
		mysqli_close($conexion);
	}

	function editarPeleaEstatal($id, $categoria, $id_juez1, $id_juez2, $id_juez3, $id_juez4, $id_boxeador1, $id_boxeador2, $fecha, $hora){
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		$editar = $conexion->query("UPDATE peleas_estatales_categoria_varonil SET categoria='$categoria',id_juez1='$id_juez1',id_juez2='$id_juez2',id_juez3='$id_juez3',id_juez4='$id_juez4',id_boxeador1='$id_boxeador1', id_boxeador2='$id_boxeador2',fecha='$fecha', hora='$hora'  WHERE id='$id'");
		$resultado=mysqli_query($conexion, $editar);

		if(!$conexion) {
			return "Error en la conexion";
			exit();
		}
		return "Registro actualizado";
		mysqli_close($conexion);
	}

	function eliminarPeleaEstatal($id) {
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		$eliminar = "DELETE FROM peleas_estatales_categoria_varonil WHERE id='$id'";
		$resultado=mysqli_query($conexion, $eliminar);

		if(!$conexion) {
			return "Error en la conexion";
			exit();
		}
		return "Registro eliminado";
		mysqli_close($conexion);
	}

	function mostrarPeleaEstatal() 
	{
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		$sql = "SELECT * FROM peleas_estatales_categoria_varonil";
		$resultado = mysqli_query($conexion, $sql);
		//categoria, id_juez1, id_juez2, id_juez3, id_juez4, id_boxeador1, id_boxeador2, fecha, hora
		$listado = "<div class='opacity table-responsive' id='div1'><table table-responsive{-sm|-md|-lg|-xl} class='table table-bordered table-striped table-dark' ><thead><tr><th>ID</th><th>Categoria</th><th>Id juez1</th><th>Id juez2</th><th>Id juez3</th><th>Id juez4</th><th>Id boxeador1</th><th>Id boxeador2</th><th>Fecha</th><th>Hora</th><th>Funciones</th></tr></thead><tbody>";
		while ($fila = mysqli_fetch_array($resultado)){
				$listado = $listado."<tr><td>".$fila['id']."</td><td>".$fila['categoria']
				."</td><td>".$fila['id_juez1']."</td><td>".$fila['id_juez2']."</td><td>".$fila['id_juez3']."</td><td>".$fila['id_juez4']
				."</td><td>".$fila['id_boxeador1']."</td><td>".$fila['id_boxeador2']."</td><td>".$fila['fecha']
				."</td><td>".$fila['hora']."</td><td>
				<a href='../controllers/soap_clients/cliente_peleas_estatales_leer.php?id=". $fila['id'] ."' title='View Record' data-toggle='tooltip'><span class='fa fa-eye'></span></a>
				<a href='../controllers/soap_clients/cliente_peleas_estatales_actualizar.php?id=". $fila['id'] ."' title='Update Record' data-toggle='tooltip'><span class='fa fa-pencil'></span></a>
				<a href='../controllers/soap_clients/cliente_peleas_estatales_elimina.php?id=". $fila['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='fa fa-trash'></span></a>
				</td></tr>";
		}
		$listado = $listado."</tbody></table></div>";
		mysqli_close($conexion);

		return new soapval('return', 'xsd:string', $listado);

	}

	//Resultado de las peleas estatales
	function buscarResultadoPeleaEstatal($id){
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");	
		$sql = "SELECT * FROM resultados_estatales_categoria_varonil where id='$id'";
		$resultado = mysqli_query($conexion, $sql);

		while ($fila = mysqli_fetch_array($resultado))
		{
			$datos = array("id" => $fila['id'], "idb1" => $fila['idb1'], "idb2" => $fila['idb2'], "peso" => $fila['peso'], "idganador" => $fila['idganador']);	
		}
		mysqli_close($conexion);
		$datos2 = implode("<", $datos);

		return $datos2;

	}

	function agregarResultadoPeleaEstatal($id, $idb1, $idb2, $peso, $idganador){
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		
		$agregar = $conexion->query("INSERT INTO resultados_estatales_categoria_varonil(id, idb1, idb2, peso, idganador) VALUES ('$id', '$idb1', '$idb2', '$peso', '$idganador')");
		$resultado=mysqli_query($conexion, $agregar);
		if(!$conexion) {
			return "Error en la conexion";
			exit();
		}
		return "Registro insertado";
		mysqli_close($conexion);
	}

	function editarResultadoPeleaEstatal($id, $idb1, $idb2, $peso, $idganador){
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		$editar = $conexion->query("UPDATE resultados_estatales_categoria_varonil SET idb1='$idb1',idb2='$idb2',peso='$peso',idganador='$idganador'  WHERE id='$id'");
		$resultado=mysqli_query($conexion, $editar);

		if(!$conexion) {
			return "Error en la conexion";
			exit();
		}
		return "Registro actualizado";
		mysqli_close($conexion);
	}

	function eliminarResultadoPeleaEstatal($id) {
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		$eliminar = "DELETE FROM resultados_estatales_categoria_varonil WHERE id='$id'";
		$resultado=mysqli_query($conexion, $eliminar);

		if(!$conexion) {
			return "Error en la conexion";
			exit();
		}
		return "Registro eliminado";
		mysqli_close($conexion);
	}

	function mostrarResultadoPeleaEstatal() 
	{
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		$sql = "SELECT * FROM resultados_estatales_categoria_varonil";
		$resultado = mysqli_query($conexion, $sql);
		//categoria, id_juez1, id_juez2, id_juez3, id_juez4, id_boxeador1, id_boxeador2, fecha, hora
		$listado = "<div class='opacity' id='div1'><table table-responsive{-sm|-md|-lg|-xl} class='table table-bordered table-striped table-dark' ><thead><tr><th>ID</th><th>Id box1</th><th>Id box2</th><th>peso</th><th>Id ganador</th><th>Funciones</th></tr></thead><tbody>";
		while ($fila = mysqli_fetch_array($resultado)){
				$listado = $listado."<tr><td>".$fila['id']."</td><td>".$fila['idb1']
				."</td><td>".$fila['idb2']."</td><td>".$fila['peso']."</td><td>".$fila['idganador']."</td><td>
				<a href='../controllers/soap_clients/cliente_resultados_peleas_estatales_leer.php?id=". $fila['id'] ."' title='View Record' data-toggle='tooltip'><span class='fa fa-eye'></span></a>
				<a href='../controllers/soap_clients/cliente_resultados_peleas_estatales_actualizar.php?id=". $fila['id'] ."' title='Update Record' data-toggle='tooltip'><span class='fa fa-pencil'></span></a>
				<a href='../controllers/soap_clients/cliente_resultados_peleas_estatales_elimina.php?id=". $fila['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='fa fa-trash'></span></a>
				</td></tr>";
		}
		$listado = $listado."</tbody></table></div>";
		mysqli_close($conexion);

		return new soapval('return', 'xsd:string', $listado);

	}

	$servicio->service(file_get_contents("php://input"));
?>