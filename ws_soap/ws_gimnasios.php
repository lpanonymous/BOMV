<?php
	include_once 'lib/nusoap.php';
	$servicio = new soap_server();
	$ns = "urn:miserviciowsdl";
	$servicio->configureWSDL("ServicioWeb-BOX", $ns);
	$servicio->schemaTargetBamespace = $ns;

	//Gimnasios
	$servicio->register('buscarGimnasio',array('id' => 'xsd:string'), array('return' => 'xsd:string'),$ns);
	$servicio->register("agregarGimnasio", array('nombre' => 'xsd:string', 'ubicacion' => 'xsd:string', 'telefono' => 'xsd:string', 'facebook' => 'xsd:string', 'email' => 'xsd:string', 'descripcion' => 'xsd:string', 'foto' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register("editarGimnasio", array('id' => 'xsd:string', 'nombre' => 'xsd:string', 'ubicacion' => 'xsd:string', 'telefono' => 'xsd:string', 'facebook' => 'xsd:string', 'email' => 'xsd:string', 'descripcion' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register("eliminarGimnasio", array('id' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register('mostrarGimnasios', array(), array('return' => 'xsd:string'), $ns);

	function buscarGimnasio($id) 
	{
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");	
		$sql = "SELECT * FROM gimnasio where id='$id'";
		$resultado = mysqli_query($conexion, $sql);

		while ($fila = mysqli_fetch_array($resultado))
		{
			$datos = array("id" => $fila['id'], "nombre" => $fila['nombre'], "ubicacion" => $fila['ubicacion'], "telefono" => $fila['telefono'], "facebook" => $fila['facebook'], "email" => $fila['email'], "descripcion" => $fila['descripcion'], "foto" => $fila['foto']);	
		}
		//$json = json_encode($datos);
		//$json2 = json_decode($datos);
		/*mysqli_close($conexion);
		$datos2 = implode("<", $datos);
		

		return $datos2;*/
		$gimnasioJSON=json_encode($datos);
		$gimnasioJSON2=json_decode($gimnasioJSON, true);
		$data = serialize($gimnasioJSON2);
		return $data;
	}

	function agregarGimnasio($nombre, $ubicacion, $telefono, $facebook, $email, $descripcion, $foto){
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		
		$agregar = $conexion->query("INSERT INTO gimnasio(nombre, ubicacion, telefono, facebook, email, descripcion, foto) VALUES ('$nombre','$ubicacion','$telefono','$facebook','$email','$descripcion', '$foto')");
		$resultado=mysqli_query($conexion, $agregar);
		if(!$conexion) {
			return "Error en la conexion";
			exit();
		}
		return "Registro insertado";
		mysqli_close($conexion);
	}

	function editarGimnasio($id, $nombre, $ubicacion, $telefono, $facebook, $email, $descripcion, $foto){
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		$editar = $conexion->query("UPDATE gimnasio SET nombre='$nombre',ubicacion='$ubicacion',telefono='$telefono',facebook='$facebook',email='$email',descripcion='$descripcion', foto='$foto'  WHERE id='$id'");
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


		$listado = "<div class='opacity'><table id='myTable' table-responsive{-sm|-md|-lg|-xl} class='table table-bordered table-striped table-dark' ><thead><tr><th>ID</th><th>Nombre</th><th>Ubicacion</th><th>Telefono</th><th>Facebook</th><th>Email</th><th>Descripción</th><th>Foto</th><th>Funciones</th></tr></thead><tbody>";

		$listado = "<div class='opacity' id='div1'><table table-responsive{-sm|-md|-lg|-xl} class='table table-bordered table-striped table-dark' ><thead><tr><th>ID</th><th>Foto</th><th>Nombre</th><th>Ubicacion</th><th>Telefono</th><th>Facebook</th><th>Email</th><th>Descripción</th><th>Funciones</th></tr></thead><tbody>";

		while ($fila = mysqli_fetch_array($resultado)){
				$listado = $listado."<tr><td>".$fila['id']."</td><td><img src='".$fila['foto']."' width='75' height='75' style= 'border-radius: 50%;'/></td><td>".$fila['nombre']
				."</td><td><a href=".$fila['ubicacion'].">Ver mapa</a></td><td>".$fila['telefono']
				."</td><td>".$fila['facebook']."</td><td>".$fila['email']."</td><td>".$fila['descripcion']."</td><td>
				<a href='../controllers/soap_clients/cliente_gimnasio_leer.php?id=". $fila['id'] ."' title='View Record' data-toggle='tooltip'><span class='fa fa-eye'></span></a>
				<a href='../controllers/soap_clients/cliente_gimnasio_actualizar.php?id=". $fila['id'] ."' title='Update Record' data-toggle='tooltip'><span class='fa fa-pencil'></span></a>
				<a href='../controllers/soap_clients/cliente_gimnasio_elimina.php?id=". $fila['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='fa fa-trash'></span></a>
				</td></tr>";
		}
		$listado = $listado."</tbody></table></div>";
		//$json = json_encode($listado);
		mysqli_close($conexion);

		return new soapval('return', 'xsd:string', $listado);

	}
	
	$servicio->service(file_get_contents("php://input"));
?>