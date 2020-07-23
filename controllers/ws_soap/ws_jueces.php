<?php
	include_once 'lib/nusoap.php';
	$servicio = new soap_server();
	$ns = "urn:miserviciowsdl";
	$servicio->configureWSDL("ServicioWeb-BOX", $ns);
	$servicio->schemaTargetBamespace = $ns;

	//Boxeadores
	$servicio->register('buscarJuez',array('id' => 'xsd:string'), array('return' => 'xsd:string'),$ns);
	
	$servicio->register("agregarJuez", array('nombre' => 'xsd:string', 'usuario' => 'xsd:string', 'contrasena' => 'xsd:string', 'foto' => 'xsd:string'), array('return' => 'xsd:string'), $ns);

	$servicio->register("editarJuez", array('id' => 'xsd:string', 'nombre' => 'xsd:string', 'usuario' => 'xsd:string', 'contrasena' => 'xsd:string', 'foto' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	
	$servicio->register("eliminarJuez", array('id' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	
	$servicio->register('mostrarJueces', array(), array('return' => 'xsd:string'), $ns);
	

	function buscarJuez($id) 
	{
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");	
		$sql = "SELECT * FROM jueces where id='$id'";
		$resultado = mysqli_query($conexion, $sql);

		while ($fila = mysqli_fetch_array($resultado))
		{
			$datos = array("id" => $fila['id'], 
						   "nombre" => $fila['nombre'], 
						   "usuario" => $fila['usuario'], 
						   "contrasena" => $fila['contrasena'], 
						   "foto" => $fila['foto']
						);	
		}
		$juezJSON=json_encode($datos);
		$juezJSON2=json_decode($juezJSON, true);
		$data = serialize($juezJSON2);
		return $data;

	}

	function agregarJuez($nombre, $usuario, $contrasena, $foto)
	{
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		
		$agregar = $conexion->query("INSERT INTO jueces(nombre, usuario, contrasena, foto) VALUES ('$nombre','$usuario','$contrasena','$foto')");
		$resultado=mysqli_query($conexion, $agregar);
		if(!$conexion) {
			return "Error en la conexion";
			exit();
		}
		return "Registro insertado";
		mysqli_close($conexion);
	}

	function editarJuez($id, $nombre, $usuario, $contrasena, $foto){
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		$editar = $conexion->query("UPDATE jueces SET id='$id',nombre='$nombre',usuario='$usuario',contrasena='$contrasena'  WHERE id='$id'");
		$resultado=mysqli_query($conexion, $editar);

		if(!$conexion) {
			return "Error en la conexion";
			exit();
		}
		return "Registro actualizado";
		mysqli_close($conexion);
	}

	function eliminarJuez($id) {
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		$eliminar = "DELETE FROM jueces WHERE id='$id'";
		$resultado=mysqli_query($conexion, $eliminar);

		if(!$conexion) {
			return "Error en la conexion";
			exit();
		}
		return "Registro eliminado";
		mysqli_close($conexion);
	}

	function mostrarJueces() 
	{
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		$sql = "SELECT * FROM jueces";
		$resultado = mysqli_query($conexion, $sql);

		$listado = "<div class='opacity' id='div1'><table table-responsive{-sm|-md|-lg|-xl} class='table table-bordered table-striped table-dark' ><thead><tr><th>ID</th><th>Foto</th><th>Nombre</th><th>usuario</th><th>Funciones</th></tr></thead><tbody>";
		while ($fila = mysqli_fetch_array($resultado)){
				$listado = $listado."<tr><td>".$fila['id']."</td><td><img src='".$fila['foto']."' width='75' height='75' style= 'border-radius: 50%;'/></td><td>".$fila['nombre']."</td><td>".$fila['usuario']
				."</td><td>
				<a href='../../controllers/soap_clients/cliente_jueces_leer.php?id=". $fila['id'] ."' title='View Record' data-toggle='tooltip'><span class='fa fa-eye'></span></a>
				<a href='../../controllers/soap_clients/cliente_jueces_actualizar.php?id=". $fila['id'] ."' title='Update Record' data-toggle='tooltip'><span class='fa fa-pencil'></span></a>
				<a href='../../controllers/soap_clients/cliente_jueces_elimina.php?id=". $fila['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='fa fa-trash'></span></a>
				</td></tr>";
		}
		$listado = $listado."</tbody></table></div>";
		//$json = json_encode($listado);
		mysqli_close($conexion);

		return new soapval('return', 'xsd:string', $listado);

	}
	
	$servicio->service(file_get_contents("php://input"));
?>