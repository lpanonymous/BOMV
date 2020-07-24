<?php
	include_once 'lib/nusoap.php';
	$servicio = new soap_server();
	$ns = "urn:miserviciowsdl";
	$servicio->configureWSDL("ServicioWeb-BOX", $ns);
	$servicio->schemaTargetBamespace = $ns;

	//Boxeadores
	$servicio->register('buscarTablaPeleaEstatal',array('id' => 'xsd:string'), array('return' => 'xsd:string'),$ns);
	
	$servicio->register("agregarTablaPeleaEstatal", array('id_pelea' => 'xsd:string', 'id_boxeador' => 'xsd:string', 'round1' => 'xsd:string', 'round2' => 'xsd:string', 'round3' => 'xsd:string', 'round4' => 'xsd:string', 'round5' => 'xsd:string', 'round6' => 'xsd:string', 'round7' => 'xsd:string', 'round8' => 'xsd:string', 'round9' => 'xsd:string', 'round10' => 'xsd:string', 'round11' => 'xsd:string', 'round12' => 'xsd:string', 'total_puntos' => 'xsd:string', 'num_jabs' => 'xsd:string', 'num_power' => 'xsd:string', 'total_golpes' => 'xsd:string', 'ganador' => 'xsd:string'), array('return' => 'xsd:string'), $ns);

	$servicio->register("editarTablaPeleaEstatal", array('id' => 'xsd:string', 'id_juez' => 'xsd:string', 'id_pelea' => 'xsd:string', 'id_boxeador' => 'xsd:string', 'round1' => 'xsd:string', 'round2' => 'xsd:string', 'round3' => 'xsd:string', 'round4' => 'xsd:string', 'round5' => 'xsd:string', 'round6' => 'xsd:string', 'round7' => 'xsd:string', 'round8' => 'xsd:string', 'round9' => 'xsd:string', 'round10' => 'xsd:string', 'round11' => 'xsd:string', 'round12' => 'xsd:string', 'total_puntos' => 'xsd:string', 'num_jabs' => 'xsd:string', 'num_power' => 'xsd:string', 'total_golpes' => 'xsd:string', 'ganador' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	
	$servicio->register("eliminarTablaPeleaEstatal", array('id' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	
	$servicio->register('mostrarTablasPeleasEstatales', array(), array('return' => 'xsd:string'), $ns);
	

	function buscarTablaPeleaEstatal($id) 
	{
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");	
		$sql = "SELECT * FROM tabla_de_pelea_estatal where id='$id'";
		$resultado = mysqli_query($conexion, $sql);

		while ($fila = mysqli_fetch_array($resultado))
		{
			$datos = array("id" => $fila['id'], 
						   "id_juez" => $fila['id_juez'], 
						   "id_pelea" => $fila['id_pelea'], 
						   "id_boxeador" => $fila['id_boxeador'], 
						   "round1" => $fila['round1'],
						   "round2" => $fila['round2'],
						   "round3" => $fila['round3'],
						   "round4" => $fila['round4'],
						   "round5" => $fila['round5'],
						   "round6" => $fila['round6'],
						   "round7" => $fila['round7'],
						   "round8" => $fila['round8'],
						   "round9" => $fila['round9'],
						   "round10" => $fila['round10'],
						   "round11" => $fila['round11'],
						   "round12" => $fila['round12'],
						   "total_puntos" => $fila['total_puntos'],
						   "num_jabs" => $fila['num_jabs'],
						   "num_power" => $fila['num_power'],
						   "total_golpes" => $fila['total_golpes'],
						   "ganador" => $fila['ganador']
						);	
		}
		$juezJSON=json_encode($datos);
		$juezJSON2=json_decode($juezJSON, true);
		$data = serialize($juezJSON2);
		return $data;

	}

	function agregarTablaPeleaEstatal($id_juez, $id_pelea, $id_boxeador, $round1, $round2, $round3, $round4, $round5, $round6, $round7, $round8, $round9, $round10, $round11, $round12, $total_puntos, $num_jabs, $num_power, $total_golpes, $ganador)
	{
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		
		$agregar = $conexion->query("INSERT INTO tabla_de_pelea_estatal(id_juez, id_pelea, id_boxeador, round1, round2, round3, round4, round5, round6, round7, round8, round9, round10, round11, round12, total_puntos, num_jabs, num_power, total_golpes, ganador) VALUES ('$id_juez','$id_pelea','$id_boxeador','$round1','$round2','$round3','$round4','$round5','$round6','$round7','$round8','$round9','$round10','$round11','$round12','$total_puntos','$num_jabs','$num_power','$total_golpes','$ganador')");
		$resultado=mysqli_query($conexion, $agregar);
		if(!$conexion) {
			return "Error en la conexion";
			exit();
		}
		return "Registro insertado";
		mysqli_close($conexion);
	}

	function editarTablaPeleaEstatal($id, $id_juez, $id_pelea, $id_boxeador, $round1, $round2, $round3, $round4, $round5, $round6, $round7, $round8, $round9, $round10, $round11, $round12, $total_puntos, $num_jabs, $num_power, $total_golpes, $ganador){
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		$editar = $conexion->query("UPDATE tabla_de_pelea_estatal SET id_juez='$id_juez',id_pelea='$id_pelea',id_boxeador='$id_boxeador',round1='$round1',round2='$round2',round3='$round3',round4='$round4',round5='$round5',round6='$round6',round7='$round7',round8='$round8',round9='$round9',round10='$round10',round11='$round11',round12='$round12',total_puntos='$total_puntos',num_jabs='$num_jabs',num_power='$num_power',total_golpes='$total_golpes',ganador='$ganador'  WHERE id='$id'");
		$resultado=mysqli_query($conexion, $editar);

		if(!$conexion) {
			return "Error en la conexion";
			exit();
		}
		return "Registro actualizado";
		mysqli_close($conexion);
	}

	function eliminarTablaPeleaEstatal($id) {
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		$eliminar = "DELETE FROM tabla_de_pelea_estatal WHERE id='$id'";
		$resultado=mysqli_query($conexion, $eliminar);

		if(!$conexion) {
			return "Error en la conexion";
			exit();
		}
		return "Registro eliminado";
		mysqli_close($conexion);
	}function mostrarTablasPeleasEstatales() 
	{
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		$sql = "SELECT * FROM tabla_de_pelea_estatal";
		$resultado = mysqli_query($conexion, $sql);

		$listado = "<div class='opacity' id='div1'><table table-responsive{-sm|-md|-lg|-xl} class='table table-bordered table-striped table-dark' ><thead><tr><th>Id</th><th>Id juez</th><th>Id pelea</th><th>Alias boxeador</th><th>round1</th><th>round2</th><th>round3</th><th>round4</th><th>round5</th><th>round6</th><th>round7</th><th>round8</th><th>round9</th><th>round10</th><th>round11</th><th>round12</th><th>Total puntos</th><th>Número de jabs</th><th>Num power</th><th>Total de golpes</th><th>Ganador?</th><th>Funciones</th></tr></thead><tbody>";
		while ($fila = mysqli_fetch_array($resultado)){
				$listado = $listado."<tr>
					<td>".$fila['id'].
					"</td><td>".$fila['id_juez'].
					"</td><td>".$fila['id_pelea'].
					"</td><td>".$fila['id_boxeador'].
					"</td><td>".$fila['round1'].
					"</td><td>".$fila['round2'].
					"</td><td>".$fila['round3'].
					"</td><td>".$fila['round4'].
					"</td><td>".$fila['round5'].
					"</td><td>".$fila['round6'].
					"</td><td>".$fila['round7'].
					"</td><td>".$fila['round8'].
					"</td><td>".$fila['round9'].
					"</td><td>".$fila['round10'].
					"</td><td>".$fila['round11'].
					"</td><td>".$fila['round12'].
					"</td><td>".$fila['total_puntos'].
					"</td><td>".$fila['num_jabs'].
					"</td><td>".$fila['num_power'].
					"</td><td>".$fila['total_golpes'].
					"</td><td>".$fila['ganador'].
					"</td><td>
				<a href='../../controllers/soap_clients/cliente_tablas_peleas_estatales_leer.php?id=". $fila['id'] ."' title='View Record' data-toggle='tooltip'><span class='fa fa-eye'></span></a>
				<a href='../../controllers/soap_clients/cliente_tablas_peleas_estatales_actualizar.php?id=". $fila['id'] ."' title='Update Record' data-toggle='tooltip'><span class='fa fa-pencil'></span></a>
				<a href='../../controllers/soap_clients/cliente_tablas_peleas_estatales_elimina.php?id=". $fila['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='fa fa-trash'></span></a>
			</td></tr>";
		}
		$listado = $listado."</tbody></table></div>";
		//$json = json_encode($listado);
		mysqli_close($conexion);

		return new soapval('return', 'xsd:string', $listado);

	}
	$servicio->service(file_get_contents("php://input"));
?>