<?php
	include_once 'lib/nusoap.php';
	$servicio = new soap_server();
	$ns = "urn:miserviciowsdl";
	$servicio->configureWSDL("ServicioWeb-BOX", $ns);
	$servicio->schemaTargetBamespace = $ns;

	//Boxeadores
	$servicio->register('buscarBoxeador',array('id' => 'xsd:string'), array('return' => 'xsd:string'),$ns);
	
	$servicio->register("agregarBoxeador", array('id_gimnasio' => 'xsd:string', 'alias' => 'xsd:string', 'nombre_boxeador' => 'xsd:string', 'total_peleas' => 'xsd:string', 'peleas_ganadas' => 'xsd:string', 'peleas_ganadas_ko' => 'xsd:string', 'peleas_perdidas' => 'xsd:string', 'peleas_perdidas_ko' => 'xsd:string', 'empates' => 'xsd:string', 'categoria' => 'xsd:string', 'division' => 'xsd:string', 'peso' => 'xsd:string', 'altura' => 'xsd:string', 'estado' => 'xsd:string', 'ciudad' => 'xsd:string', 'municipio' => 'xsd:string', 'foto' => 'xsd:string'), array('return' => 'xsd:string'), $ns);

	$servicio->register("editarBoxeador", array('id_boxeador' => 'xsd:string', 'id_gimnasio' => 'xsd:string', 'alias' => 'xsd:string', 'nombre_boxeador' => 'xsd:string', 'total_peleas' => 'xsd:string', 'peleas_ganadas' => 'xsd:string', 'peleas_ganadas_ko' => 'xsd:string', 'peleas_perdidas' => 'xsd:string', 'peleas_perdidas_ko' => 'xsd:string', 'empates' => 'xsd:string', 'categoria' => 'xsd:string', 'division' => 'xsd:string', 'peso' => 'xsd:string', 'altura' => 'xsd:string', 'estado' => 'xsd:string', 'ciudad' => 'xsd:string', 'municipio' => 'xsd:string', 'foto' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	
	$servicio->register("eliminarBoxeador", array('id' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	
	$servicio->register('mostrarBoxeadores', array(), array('return' => 'xsd:string'), $ns);
	

	function buscarBoxeador($id) 
	{
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");	
		$sql = "SELECT * FROM boxeadores where id_boxeador='$id'";
		$resultado = mysqli_query($conexion, $sql);

		while ($fila = mysqli_fetch_array($resultado)){
			$datos = array("id_boxeador" => $fila['id_boxeador'], "id_gimnasio" => $fila['id_gimnasio'], "alias" => $fila['alias'], "nombre_boxeador" => $fila['nombre_boxeador'], "total_peleas" => $fila['total_peleas'], "peleas_ganadas" => $fila['peleas_ganadas'], "peleas_ganadas_ko" => $fila['peleas_ganadas_ko'], "peleas_perdidas" => $fila['peleas_perdidas'], "peleas_perdidas_ko" => $fila['peleas_perdidas_ko'], "empates" => $fila['empates'], "categoria" => $fila['categoria'], "division" => $fila['division'], "peso" => $fila['peso'], "altura" => $fila['altura'], "estado" => $fila['estado'], "ciudad" => $fila['ciudad'], "municipio" => $fila['municipio'], "foto" => $fila['foto']);	
		}
		$gimnasioJSON=json_encode($datos);
		$gimnasioJSON2=json_decode($gimnasioJSON, true);
		$data = serialize($gimnasioJSON2);
		return $data;
	}

	function agregarBoxeador($id_gimnasio, $alias, $nombre_boxeador, $total_peleas, $peleas_ganadas, $peleas_ganadas_ko, $peleas_perdidas, $peleas_perdidas_ko, $empates, $categoria, $division, $peso, $altura, $estado, $ciudad, $municipio, $foto){
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		
		$agregar = $conexion->query("INSERT INTO boxeadores(id_gimnasio, alias, nombre_boxeador, total_peleas, peleas_ganadas, peleas_ganadas_ko, peleas_perdidas, peleas_perdidas_ko, empates, categoria, division, peso, altura, estado, ciudad, municipio, foto) VALUES ('$id_gimnasio', '$alias', '$nombre_boxeador', '$total_peleas', '$peleas_ganadas', '$peleas_ganadas_ko', '$peleas_perdidas', '$peleas_perdidas_ko', '$empates', '$categoria', '$division', '$peso', '$altura', '$estado', '$ciudad', '$municipio', '$foto')");
		$resultado=mysqli_query($conexion, $agregar);
		if(!$conexion) {
			return "Error en la conexion";
			exit();
		}
		return "Registro insertado";
		mysqli_close($conexion);
	}

	function editarBoxeador($id_boxeador, $id_gimnasio, $alias, $nombre_boxeador, $total_peleas, $peleas_ganadas, $peleas_ganadas_ko, $peleas_perdidas, $peleas_perdidas_ko, $empates, $categoria, $division, $peso, $altura, $estado, $ciudad, $municipio, $foto){
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		$editar = $conexion->query("UPDATE boxeadores SET 
		id_boxeador='$id_boxeador', id_gimnasio='$id_gimnasio', alias='$alias', nombre_boxeador='$nombre_boxeador', total_peleas='$total_peleas', peleas_ganadas='$peleas_ganadas', peleas_ganadas_ko='$peleas_ganadas_ko', peleas_perdidas='$peleas_perdidas', peleas_perdidas_ko='$peleas_perdidas_ko', empates='$empates', categoria='$categoria', division='$division', peso='$peso', altura='$altura', estado='$estado', ciudad='$ciudad', municipio='$municipio', foto='$foto' WHERE id_boxeador='$id_boxeador'");
		$resultado=mysqli_query($conexion, $editar);
		if(!$conexion) {
			return "Error en la conexion";
			exit();
		}
		return "Registro actualizado";
		mysqli_close($conexion);
	}

	function eliminarBoxeador($id) {
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		$eliminar = "DELETE FROM boxeadores WHERE id_boxeador='$id'";
		$resultado=mysqli_query($conexion, $eliminar);

		if(!$conexion) {
			return "Error en la conexion";
			exit();
		}
		return "Registro eliminado";
		mysqli_close($conexion);
	}

	function mostrarBoxeadores() 
	{
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		$sql = "SELECT * FROM boxeadores";
		$resultado = mysqli_query($conexion, $sql);

		//id_gimnasio, alias, nombre_boxeador, total_peleas, peleas_ganadas, peleas_ganadas_ko, peleas_perdidas, peleas_perdidas_ko, empates, categoria, division, peso, altura, estado, ciudad, municipio, foto
		$listado = "<div class='opacity' id='div1'><table table-responsive{-sm|-md|-lg|-xl} class='table table-bordered table-striped table-dark' id='myTable'><thead><tr><th>ID</th><th>Foto</th><th>id_gimnasio</th><th>alias</th><th>Nombre</th><th>total_peleas</th><th>peleas_ganadas</th><th>peleas_ganadas_ko</th><th>peleas_perdidas</th><th>peleas_perdidas_ko</th><th>empates</th><th>categoria</th><th>division</th><th>peso</th><th>altura</th><th>estado</th><th>ciudad</th><th>municipio</th><th>Funciones</th></tr></thead><tbody>";


		while ($fila = mysqli_fetch_array($resultado)){
				$listado = $listado."<tr><td>".$fila['id_boxeador']."</td><td><img src='".$fila['foto']."' width='75' height='75' style= 'border-radius: 50%;'/></td><td>".$fila['id_gimnasio']
				."</td><td>".$fila['alias']."</td><td>".$fila['nombre_boxeador']
				."</td><td>".$fila['total_peleas']."</td><td>".$fila['peleas_ganadas']."</td><td>".$fila['peleas_ganadas_ko']."</td><td>".$fila['peleas_perdidas']."</td><td>".$fila['peleas_perdidas_ko']."</td><td>".$fila['empates']."</td><td>".$fila['categoria']."</td><td>".$fila['division']."</td><td>".$fila['peso']."</td><td>".$fila['altura']."</td><td>".$fila['estado']."</td><td>".$fila['ciudad']."</td><td>".$fila['municipio']."</td><td>
				<a href='../../controllers/soap_clients/cliente_boxeadores_leer.php?id=". $fila['id_boxeador'] ."' title='View Record' data-toggle='tooltip'><span class='fa fa-eye'></span></a>
				<a href='../../controllers/soap_clients/cliente_boxeadores_actualizar.php?id=". $fila['id_boxeador'] ."' title='Update Record' data-toggle='tooltip'><span class='fa fa-pencil'></span></a>
				<a href='../../controllers/soap_clients/cliente_boxeadores_elimina.php?id=". $fila['id_boxeador'] ."' title='Delete Record' data-toggle='tooltip'><span class='fa fa-trash'></span></a>
			</td></tr>";
		}
		$listado = $listado."</tbody></table></div>";
		//$json = json_encode($listado);
		mysqli_close($conexion);

		return new soapval('return', 'xsd:string', $listado);

	}
	
	$servicio->service(file_get_contents("php://input"));
?>