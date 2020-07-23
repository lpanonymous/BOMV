<?php
    include_once 'lib/nusoap.php';
	$servicio = new soap_server();
	$ns = "urn:miserviciowsdl";
	$servicio->configureWSDL("ServicioWeb-BOX", $ns);
    $servicio->schemaTargetBamespace = $ns;

	//Noticias
	$servicio->register('buscarNoticia',array('id' => 'xsd:string'), array('return' => 'xsd:string'),$ns);
	$servicio->register("agregarNoticia", array('titulo' => 'xsd:string', 'fecha' => 'xsd:string', 'cuerpo' => 'xsd:string', 'foto' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register("editarNoticia", array('id' => 'xsd:string', 'titulo' => 'xsd:string', 'fecha' => 'xsd:string', 'cuerpo' => 'xsd:string', 'foto' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register("eliminarNoticia", array('id' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register('mostrarNoticias', array(), array('return' => 'xsd:string'), $ns);


    function buscarNoticia($id) 
	{
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");	
		$sql = "SELECT * FROM noticias where id='$id'";
		$resultado = mysqli_query($conexion, $sql);

		while ($fila = mysqli_fetch_array($resultado))
		{
			$datos = array("id" => $fila['id'], "titulo" => $fila['titulo'], "fecha" => $fila['fecha'], "cuerpo" => $fila['cuerpo'], "foto" => $fila['foto']);	
		}
		/*mysqli_close($conexion);
		$datos2 = implode("<", $datos);
		return $datos2;*/
		$noticiaJSON=json_encode($datos);
		$noticiaJSON2=json_decode($noticiaJSON, true);
		$data = serialize($noticiaJSON2);
		return $data;
	}

	function agregarNoticia($titulo, $fecha, $cuerpo, $foto)
	{
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		
		$agregar = $conexion->query("INSERT INTO noticias(titulo, fecha, cuerpo, foto) VALUES ('$titulo','$fecha','$cuerpo','$foto')");
		$resultado=mysqli_query($conexion, $agregar);
		if(!$conexion) {
			return "Error en la conexion";
			exit();
		}
		return "Registro insertado";
		mysqli_close($conexion);
	}

	function editarNoticia($id, $titulo, $fecha, $cuerpo, $foto){
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		$editar = $conexion->query("UPDATE noticias SET titulo='$titulo',fecha='$fecha',cuerpo='$cuerpo',foto='$foto' WHERE id='$id'");
		$resultado=mysqli_query($conexion, $editar);

		if(!$conexion) {
			return "Error en la conexion";
			exit();
		}
		return "Registro actualizado";
		mysqli_close($conexion);
	}

	function eliminarNoticia($id) {
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		$eliminar = "DELETE FROM noticias WHERE id='$id'";
		$resultado=mysqli_query($conexion, $eliminar);

		if(!$conexion) {
			return "Error en la conexion";
			exit();
		}
		return "Registro eliminado";
		mysqli_close($conexion);
	}

	function mostrarNoticias() 
	{
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		$sql = "SELECT * FROM noticias";
		$resultado = mysqli_query($conexion, $sql);

		$listado = "<div class='opacity' id='div1'><table table-responsive{-sm|-md|-lg|-xl} class='table table-bordered table-striped table-dark' ><thead><tr><th>ID</th><th>Foto</th><th>Titulo</th><th>Fecha</th><th>Cuerpo</th><th>Funciones</th></tr></thead><tbody>";
		while ($fila = mysqli_fetch_array($resultado)){
				$listado = $listado."<tr><td>".$fila['id']."</td><td><img src='".$fila['foto']."' width='75' height='75' style= 'border-radius: 50%;'/></td><td>".$fila['titulo']."</td><td>".date("d/m/Y", strtotime($fila['fecha']))."</td><td>".$fila['cuerpo']."</td><td>
				<a href='../controllers/soap_clients/cliente_noticias_leer.php?id=". $fila['id'] ."' title='View Record' data-toggle='tooltip'><span class='fa fa-eye'></span></a>
				<a href='../controllers/soap_clients/cliente_noticias_actualizar.php?id=". $fila['id'] ."' title='Update Record' data-toggle='tooltip'><span class='fa fa-pencil'></span></a>
				<a href='../controllers/soap_clients/cliente_noticias_elimina.php?id=". $fila['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='fa fa-trash'></span></a>
				</td></tr>";
		}
		$listado = $listado."</tbody></table></div>";
		mysqli_close($conexion);

		return new soapval('return', 'xsd:string', $listado);

	}
?>