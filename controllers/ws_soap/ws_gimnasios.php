<?php
	include_once 'lib/nusoap.php';
	$servicio = new soap_server();
	$ns = "urn:miserviciowsdl";
	$servicio->configureWSDL("ServicioWeb-BOX", $ns);
	$servicio->schemaTargetBamespace = $ns;

	//Gimnasios
	$servicio->register('buscarGimnasio',array('id' => 'xsd:string'), array('return' => 'xsd:string'),$ns);
	$servicio->register("agregarGimnasio", array('nombre' => 'xsd:string', 'ubicacion' => 'xsd:string', 'telefono' => 'xsd:string', 'facebook' => 'xsd:string', 'email' => 'xsd:string', 'descripcion' => 'xsd:string', 'foto' => 'xsd:string', 'nombre_foto' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register("editarGimnasio", array('id' => 'xsd:string', 'nombre' => 'xsd:string', 'ubicacion' => 'xsd:string', 'telefono' => 'xsd:string', 'facebook' => 'xsd:string', 'email' => 'xsd:string', 'descripcion' => 'xsd:string', 'foto' => 'xsd:string', 'nombre_foto' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register("eliminarGimnasio", array('id' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register('mostrarGimnasios', array(), array('return' => 'xsd:string'), $ns);
	$servicio->register('mostrarGimnasiosUsers', array(), array('return' => 'xsd:string'), $ns);

	function buscarGimnasio($id) 
	{
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");	
		$sql = "SELECT * FROM gimnasio where id='$id'";
		$resultado = mysqli_query($conexion, $sql);

		while ($fila = mysqli_fetch_array($resultado))
		{
			$datos = array("id" => $fila['id'], "nombre" => $fila['nombre'], "ubicacion" => $fila['ubicacion'], "telefono" => $fila['telefono'], "facebook" => $fila['facebook'], "email" => $fila['email'], "descripcion" => $fila['descripcion'], "nombre_foto" => $fila['nombre_foto']);	
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

	function agregarGimnasio($nombre, $ubicacion, $telefono, $facebook, $email, $descripcion, $foto, $nombre_foto){
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		$location = "..\\..\\resources\\images\\gimnasios\\".$nombre_foto;                               // Mention where to upload the file
		$current = file_get_contents($location);                     // Get the file content. This will create an empty file if the file does not exist     
		$current = base64_decode($foto);                          // Now decode the content which was sent by the client     
		file_put_contents($location, $current);                      // Write the decoded content in the file mentioned at particular location      
			
		$agregar = $conexion->query("INSERT INTO gimnasio(nombre, ubicacion, telefono, facebook, email, descripcion, nombre_foto) VALUES ('$nombre','$ubicacion','$telefono','$facebook','$email','$descripcion', '$nombre_foto')");
		$resultado=mysqli_query($conexion, $agregar);
		if(!$conexion) {
			return "Error en la conexion";
			exit();
		}
		return "Registro insertado";
		mysqli_close($conexion);
	}

	function editarGimnasio($id, $nombre, $ubicacion, $telefono, $facebook, $email, $descripcion, $foto, $nombre_foto){
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		$location = "..\\..\\resources\\images\\gimnasios\\".$nombre_foto;                               // Mention where to upload the file
        $current = file_get_contents($location);                     // Get the file content. This will create an empty file if the file does not exist     
        $current = base64_decode($foto);                          // Now decode the content which was sent by the client     
        file_put_contents($location, $current);                      // Write the decoded content in the file mentioned at particular location      
		$editar = $conexion->query("UPDATE gimnasio SET nombre='$nombre',ubicacion='$ubicacion',telefono='$telefono',facebook='$facebook',email='$email',descripcion='$descripcion', nombre_foto='$nombre_foto'  WHERE id='$id'");
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


		$listado = "<div class='opacity'><table id='myTable' table-responsive{-sm|-md|-lg|-xl} class='table table-bordered table-striped table-dark' id='myTable'><thead><tr><th>ID</th><th>Foto</th><th>Nombre</th><th>Ubicacion</th><th>Telefono</th><th>Facebook</th><th>Email</th><th>Descripción</th><th>Funciones</th></tr></thead><tbody>";


		while ($fila = mysqli_fetch_array($resultado)){
				$listado = $listado."<tr><td>".$fila['id']."</td><td><img src='../../resources/images/gimnasios/".$fila['nombre_foto']."' width='75' height='75' style= 'border-radius: 50%;'/></td><td>".$fila['nombre']
				."</td><td><a href=".$fila['ubicacion'].">Ver mapa</a></td><td>".$fila['telefono']
				."</td><td>".$fila['facebook']."</td><td>".$fila['email']."</td><td>".$fila['descripcion']."</td><td>
				<a href='../../controllers/soap_clients/cliente_gimnasio_leer.php?id=". $fila['id'] ."' title='View Record' data-toggle='tooltip'><span class='fa fa-eye'></span></a>
				<a href='../../controllers/soap_clients/cliente_gimnasio_actualizar.php?id=". $fila['id'] ."' title='Update Record' data-toggle='tooltip'><span class='fa fa-pencil'></span></a>
				<a href='../../controllers/soap_clients/cliente_gimnasio_elimina.php?id=". $fila['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='fa fa-trash'></span></a>
				</td></tr>";
		}
		$listado = $listado."</tbody></table></div>";
		//$json = json_encode($listado);
		mysqli_close($conexion);

		return new soapval('return', 'xsd:string', $listado);

	}
	
	function mostrarGimnasiosUsers() 
	{
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		$sql = "SELECT * FROM gimnasio";
		$resultado = mysqli_query($conexion, $sql);

		$listado = "<div class='card-group'>";
		$cont = 0;
		while ($fila = mysqli_fetch_array($resultado))
		{
			$cont = $cont+1;
			if($cont<=3)
			{
				$listado = $listado."<div class='card'>

				<img class='card-img-top' src='".$fila['nombre_foto']."' alt='Card image cap' height='400px'>
				<img class='card-img-top' src='../../resources/images/gimnasios/".$fila['nombre_foto']."' alt='Card image cap' height='400px'>
				<div class='card-body'>
				<h5 class='card-title'>".$fila['nombre']."</h5>
				<p class='card-text'>Telefono: ".$fila['telefono']."</p>
				<p class='card-text'>Facebook: ".$fila['facebook']."</p>
				<p class='card-text'>Email: ".$fila['email']."</p>
				<p class='card-text'>Descripción: ".$fila['descripcion']."</p>
				<p class='card-text'><a href='".$fila['ubicacion']."'>Clic para ver la ubicación...<a></p>
				<form action='boxeadores.php' method='Post'>
				  <input type='text' value='".$fila['id']."' name='id' hidden/>
				  <input type='text' value='".$fila['nombre']."' name='nombre' hidden/>
				  <input type='submit' class='btn btn-primary' value='Ver boxeadores participantes'/>
				</form>
				</div>
				</div>";
			}
			else
			{
				$cont = 0;
				$listado = $listado."</div>
				<div class='card-group'>
				<div class='card'>
				<img class='card-img-top' src='".$fila['nombre_foto']."' alt='Card image cap' height='400px'>
				<img class='card-img-top' src='../../resources/images/gimnasios/".$fila['nombre_foto']."' alt='Card image cap' height='400px'>
				<div class='card-body'>
					<h5 class='card-title'>".$fila['nombre']."</h5>
					<p class='card-text'>Telefono: ".$fila['telefono']."</p>
					<p class='card-text'>Facebook: ".$fila['facebook']."</p>
					<p class='card-text'>Email: ".$fila['email']."</p>
					<p class='card-text'>Descripción: ".$fila['descripcion']."</p>
					<p class='card-text'><a href='".$fila['ubicacion']."'>Clic para ver la ubicación...<a></p>
					<form action='boxeadores.php' method='Post'>
					<input type='text' value='".$fila['id']."' name='id' hidden/>
					<input type='text' value='".$fila['nombre']."' name='nombre' hidden/>
					<input type='submit' class='btn btn-primary' value='Ver boxeadores participantes'/>
					</form>
				</div>
				</div>";
			}
		}
		$listado = $listado."</div>";
		//$json = json_encode($listado);
		mysqli_close($conexion);

		return new soapval('return', 'xsd:string', $listado);

	}
	$servicio->service(file_get_contents("php://input"));
?>