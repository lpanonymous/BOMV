<?php
	include_once 'lib/nusoap.php';
	$servicio = new soap_server();
	$ns = "urn:miserviciowsdl";
	$servicio->configureWSDL("ServicioWeb-BOX", $ns);
	$servicio->schemaTargetBamespace = $ns;
	
	$servicio->register("agregarGimnasio", array('id' => 'xsd:string', 'nombre' => 'xsd:string', 'ubicacion' => 'xsd:string', 'telefono' => 'xsd:string', 'facebook' => 'xsd:string', 'email' => 'xsd:string', 'descripcion' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	/*$servicio->register("editarGimnasios", array('id' => 'xsd:string', 'nombre' => 'xsd:string', 'ubicacion' => 'xsd:string', 'telefono' => 'xsd:int', 'facebook' => 'xsd:string', 'email' => 'xsd:string', 'descripcion' => 'xsd:string'), array('return' => 'xsd:string'), $ns);*/
	$servicio->register("editarGimnasio", array('id' => 'xsd:string', 'nombre' => 'xsd:string', 'ubicacion' => 'xsd:string', 'telefono' => 'xsd:string', 'facebook' => 'xsd:string', 'email' => 'xsd:string', 'descripcion' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register("eliminarGimnasio", array('id' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register('buscarGimnasio',array('id' => 'xsd:string'), array('return' => 'xsd:string'),$ns);
	$servicio->register('mostrarGimnasios', array(), array('return' => 'xsd:string'), $ns);

	function buscarGimnasio($id) 
	{
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");	
		$sql = "SELECT * FROM gimnasio where id='$id'";
		$resultado = mysqli_query($conexion, $sql);
		
		$listado = "<table><tr><td>ID</td><td>Nombre</td><td>Ubicación</td><td>Teléfono</td><td>Facebook</td><td>Email</td><td>Descripción</td><td>Foto</td></tr>";
		while ($fila = mysqli_fetch_array($resultado)){
			$listado = $listado."<tr><td>".$fila['id']."</td><td>".$fila['nombre']
				."</td><td>".$fila['ubicacion']."</td><td>".$fila['telefono']
				."</td><td>".$fila['facebook']."</td><td>".$fila['email']."</td><td>".$fila['descripcion']
				."</td><td>".$fila['foto']."</td></tr>";
		}
		$listado = $listado."</table>";
		mysqli_close($conexion);

		return new soapval('return', 'xsd:string', $listado);

	}

	function agregarGimnasio($id, $nombre, $ubicacion, $telefono, $facebook, $email, $descripcion){
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		
		$agregar = $conexion->query("INSERT INTO gimnasio(id, nombre, ubicacion, telefono, facebook, email, descripcion) VALUES ('".$id."','".$nombre."','".$ubicacion."','".$telefono."','".$facebook."','".$email."','".$descripcion."')");
		$resultado=mysqli_query($conexion, $agregar);
		if(!$conexion) {
			return "Error en la conexion";
			exit();
		}
		return "Registro insertado";
		mysqli_close($conexion);
	}

	function editarGimnasio($id, $nombre, $ubicacion, $telefono, $facebook, $email, $descripcion){
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		$editar = $conexion->query("UPDATE gimnasio SET nombre='$nombre',ubicacion='$ubicacion',telefono='$telefono',facebook='$facebook',email='$email',descripcion='$descripcion' WHERE id='$id'");
		$resultado=mysqli_query($conexion, $editar);

		if(!$conexion) {
			return "Error en la conexion";
			exit();
		}
		return "Registro actualizado";
		mysqli_close($conexion);
	}

	function eliminarGimnasio($id) {
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		$eliminar = "DELETE FROM gimnasio WHERE id='$id'";
		$resultado=mysqli_query($conexion, $eliminar);

		if(!$conexion) {
			return "Error en la conexion";
			exit();
		}
		return "Registro eliminado";
		mysqli_close($conexion);
	}

	function mostrarGimnasios() 
	{
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		$sql = "SELECT * FROM gimnasio";
		$resultado = mysqli_query($conexion, $sql);

		$listado = "<table><tr><td>ID</td><td>Nombre</td><td>Ubicacion</td><td>Telefono</td><td>Facebook</td><td>Email</td><td>Descripción</td><td>Foto</td></tr>";
		while ($fila = mysqli_fetch_array($resultado)){
			$listado = $listado."<tr><td>".$fila['id']."</td><td>".$fila['nombre']
				."</td><td>".$fila['ubicacion']."</td><td>".$fila['telefono']
				."</td><td>".$fila['facebook']."</td><td>".$fila['email']."</td><td>".$fila['descripcion']
				."</td><td>".$fila['foto']."</td></tr>";
		}
		$listado = $listado."</table>";
		mysqli_close($conexion);

		return new soapval('return', 'xsd:string', $listado);

	}
	$servicio->service(file_get_contents("php://input"));
?>