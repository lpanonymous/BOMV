<?php
	include_once 'lib/nusoap.php';
	$servicio = new soap_server();
	$ns = "urn:miserviciowsdl";
	$servicio->configureWSDL("ServicioWeb-BOX", $ns);
	$servicio->schemaTargetBamespace = $ns;

	//Gimnasios
	$servicio->register("agregarGimnasio", array('id' => 'xsd:string', 'nombre' => 'xsd:string', 'ubicacion' => 'xsd:string', 'telefono' => 'xsd:string', 'facebook' => 'xsd:string', 'email' => 'xsd:string', 'descripcion' => 'xsd:string', 'foto' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register("editarGimnasio", array('id' => 'xsd:string', 'nombre' => 'xsd:string', 'ubicacion' => 'xsd:string', 'telefono' => 'xsd:string', 'facebook' => 'xsd:string', 'email' => 'xsd:string', 'descripcion' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register("eliminarGimnasio", array('id' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register('buscarGimnasio',array('id' => 'xsd:string'), array('return' => 'xsd:string'),$ns);
	$servicio->register('mostrarGimnasios', array(), array('return' => 'xsd:string'), $ns);

	//Noticias
	$servicio->register("agregarNoticia", array('id' => 'xsd:string', 'titulo' => 'xsd:string', 'fecha' => 'xsd:string', 'cuerpo' => 'xsd:string', 'foto' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register("editarNoticia", array('id' => 'xsd:string', 'titulo' => 'xsd:string', 'fecha' => 'xsd:string', 'cuerpo' => 'xsd:string', 'foto' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register("eliminarNoticia", array('id' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register('buscarNoticia',array('id' => 'xsd:string'), array('return' => 'xsd:string'),$ns);
	$servicio->register('mostrarNoticias', array(), array('return' => 'xsd:string'), $ns);

	//Boxeadores
	$servicio->register("agregarBoxeador", array('id_boxeador' => 'xsd:string', 'id_gimnasio' => 'xsd:string', 'alias' => 'xsd:string', 'nombre_boxeador' => 'xsd:string', 'total_peleas' => 'xsd:string', 'peleas_ganadas' => 'xsd:string', 'peleas_ganadas_ko' => 'xsd:string', 'peleas_perdidas' => 'xsd:string', 'peleas_perdidas_ko' => 'xsd:string', 'empates' => 'xsd:string', 'categoria' => 'xsd:string', 'division' => 'xsd:string', 'peso' => 'xsd:string', 'altura' => 'xsd:string', 'estado' => 'xsd:string', 'ciudad' => 'xsd:string', 'municipio' => 'xsd:string', 'foto' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register("editarBoxeador", array('id_boxeador' => 'xsd:string', 'id_gimnasio' => 'xsd:string', 'alias' => 'xsd:string', 'nombre_boxeador' => 'xsd:string', 'total_peleas' => 'xsd:string', 'peleas_ganadas' => 'xsd:string', 'peleas_ganadas_ko' => 'xsd:string', 'peleas_perdidas' => 'xsd:string', 'peleas_perdidas_ko' => 'xsd:string', 'empates' => 'xsd:string', 'categoria' => 'xsd:string', 'division' => 'xsd:string', 'peso' => 'xsd:string', 'altura' => 'xsd:string', 'estado' => 'xsd:string', 'ciudad' => 'xsd:string', 'municipio' => 'xsd:string', 'foto' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register("eliminarBoxeador", array('id' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register('buscarBoxeador',array('id' => 'xsd:string'), array('return' => 'xsd:string'),$ns);
	$servicio->register('mostrarBoxeadores', array(), array('return' => 'xsd:string'), $ns);

	//Jueces
	$servicio->register("agregarJuez", array('id' => 'xsd:string', 'nombre' => 'xsd:string', 'usuario' => 'xsd:string', 'contrasena' => 'xsd:string', 'foto' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register("editarJuez", array('id' => 'xsd:string', 'nombre' => 'xsd:string', 'usuario' => 'xsd:string', 'contrasena' => 'xsd:string', 'foto' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register("eliminarJuez", array('id' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register('buscarJuez',array('id' => 'xsd:string'), array('return' => 'xsd:string'),$ns);
	$servicio->register('mostrarJueces', array(), array('return' => 'xsd:string'), $ns);

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
		$boxeadorJSON=json_encode($datos);
		$boxeadorJSON2=json_decode($boxeadorJSON, true);
		$data = serialize($boxeadorJSON2);
		return $data;
	}

	function agregarGimnasio($id, $nombre, $ubicacion, $telefono, $facebook, $email, $descripcion, $foto){
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		
		$agregar = $conexion->query("INSERT INTO gimnasio(id, nombre, ubicacion, telefono, facebook, email, descripcion, foto) VALUES ('$id','$nombre','$ubicacion','$telefono','$facebook','$email','$descripcion', '$foto')");
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
		$boxeadorJSON=json_encode($datos);
		$boxeadorJSON2=json_decode($boxeadorJSON, true);
		$data = serialize($boxeadorJSON2);
		return $data;
	}

	function agregarNoticia($id, $titulo, $fecha, $cuerpo, $foto)
	{
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		
		$agregar = $conexion->query("INSERT INTO noticias(id, titulo, fecha, cuerpo, foto) VALUES ('$id','$titulo','$fecha','$cuerpo','$foto')");
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
				$listado = $listado."<tr><td>".$fila['id']."</td><td><img src='".$fila['foto']."' width='75' height='75' style= 'border-radius: 50%;'/></td><td>".$fila['titulo']."</td><td>".$fila['fecha']
				."</td><td>".$fila['cuerpo']."</td><td>
				<a href='../controllers/soap_clients/cliente_noticias_leer.php?id=". $fila['id'] ."' title='View Record' data-toggle='tooltip'><span class='fa fa-eye'></span></a>
				<a href='../controllers/soap_clients/cliente_noticias_actualizar.php?id=". $fila['id'] ."' title='Update Record' data-toggle='tooltip'><span class='fa fa-pencil'></span></a>
				<a href='../controllers/soap_clients/cliente_noticias_elimina.php?id=". $fila['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='fa fa-trash'></span></a>
				</td></tr>";
		}
		$listado = $listado."</tbody></table></div>";
		mysqli_close($conexion);

		return new soapval('return', 'xsd:string', $listado);

	}

	function buscarBoxeador($id) 
	{
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");	
		$sql = "SELECT * FROM boxeadores where id_boxeador='$id'";
		$resultado = mysqli_query($conexion, $sql);

		while ($fila = mysqli_fetch_array($resultado))
		{
			$datos = array("id_boxeador" => $fila['id_boxeador'], 
						   "id_gimnasio" => $fila['id_gimnasio'], 
						   "alias" => $fila['alias'], 
						   "nombre_boxeador" => $fila['nombre_boxeador'], 
						   "total_peleas" => $fila['total_peleas'], 
						   "peleas_ganadas" => $fila['peleas_ganadas'], 
						   "peleas_ganadas_ko" => $fila['peleas_ganadas_ko'], 
						   "peleas_perdidas" => $fila['peleas_perdidas'],
						   "peleas_perdidas_ko" => $fila['peleas_perdidas_ko'],
						   "empates" => $fila['empates'],
						   "categoria" => $fila['categoria'],
						   "division" => $fila['division'],
						   "peso" => $fila['peso'],
						   "altura" => $fila['altura'],
						   "estado" => $fila['estado'],
						   "ciudad" => $fila['ciudad'],
						   "municipio" => $fila['municipio'],
						   "foto" => $fila['foto'],
						);	
		}
		$boxeadorJSON=json_encode($datos);
		$boxeadorJSON2=json_decode($boxeadorJSON, true);
		$data = serialize($boxeadorJSON2);
		return $data;

	}

	function agregarBoxeador($id_boxeador, $id_gimnasio, $alias, $nombre_boxeador, $total_peleas, $peleas_ganadas, $peleas_ganadas_ko, $peleas_perdidas, $peleas_perdidas_ko, $empates, $categoria, $division, $peso, $altura, $estado, $ciudad, $municipio, $foto){
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		
		$agregar = $conexion->query("INSERT INTO boxeadores(id_boxeador, id_gimnasio, alias, nombre_boxeador, total_peleas, peleas_ganadas, peleas_ganadas_ko, peleas_perdidas, peleas_perdidas_ko, empates, categoria, division, peso, altura, estado, ciudad, municipio, foto) VALUES ('$id_boxeador','$id_gimnasio','$alias','$nombre_boxeador','$total_peleas','$peleas_ganadas','$peleas_ganadas_ko', '$peleas_perdidas', '$peleas_perdidas_ko', '$empates', '$categoria', '$division', '$peso', '$altura', '$estado', '$ciudad', '$municipio', '$foto')");
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
		$editar = $conexion->query("UPDATE boxeadores SET id_gimnasio='$id_gimnasio',alias='$alias',nombre_boxeador='$nombre_boxeador',total_peleas='$total_peleas',peleas_ganadas='$peleas_ganadas',peleas_ganadas_ko='$peleas_ganadas_ko', peleas_perdidas='$peleas_perdidas', peleas_perdidas_ko='$peleas_perdidas_ko', empates='$empates', categoria='$categoria', division='$division', peso='$peso', altura='$altura', estado='$estado', ciudad='$ciudad', municipio='$municipio', foto='$foto'  WHERE id_boxeador='$id_boxeador'");
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
		//categoria, id_juez1, id_juez2, id_juez3, id_juez4, id_boxeador1, id_boxeador2, fecha, hora
		$listado = "<div class='opacity table-responsive' id='div1'><table table-responsive{-sm|-md|-lg|-xl} class='table table-bordered table-striped table-dark' ><thead><tr><th>ID</th><th>Foto</th><th>ID Gimnasio</th><th>Alias</th><th>Nombre</th><th>#Total peleas</th><th>#Peleas ganadas</th><th>#Peleas ganadas k.o</th><th>#Peleas perdidas</th><th>#Peleas perdidas k.o</th><th>Empates</th><th>Categoria</th><th>División</th><th>Peso</th><th>Altura</th><th>Estado</th><th>Ciudad</th><th>Municipio</th><th>Funciones</th></tr></thead><tbody>";
		while ($fila = mysqli_fetch_array($resultado)){
			$listado = $listado."<tr><td>".$fila['id_boxeador']."</td><td><img src='".$fila['foto']."' width='75' height='75' style= 'border-radius: 50%;'/></td><td>".$fila['id_gimnasio']."</td><td>".$fila['alias']
			."</td><td>".$fila['nombre_boxeador']."</td><td>".$fila['total_peleas']."</td><td>".$fila['peleas_ganadas']
			."</td><td>".$fila['peleas_ganadas_ko']."</td><td>".$fila['peleas_perdidas']."</td><td>".$fila['peleas_perdidas_ko']
			."</td><td>".$fila['empates']."</td><td>".$fila['categoria']."</td><td>".$fila['division']."</td><td>".$fila['peso']
			."</td><td>".$fila['altura']."</td><td>".$fila['estado']."</td><td>".$fila['ciudad']."</td><td>".$fila['municipio']."</td><td>
			<a href='../controllers/soap_clients/cliente_boxeadores_leer.php?id=". $fila['id_boxeador'] ."' title='View Record' data-toggle='tooltip'><span class='fa fa-eye'></span></a>
			<a href='../controllers/soap_clients/cliente_boxeadores_actualizar.php?id=". $fila['id_boxeador'] ."' title='Update Record' data-toggle='tooltip'><span class='fa fa-pencil'></span></a>
			<a href='../controllers/soap_clients/cliente_boxeadores_elimina.php?id=". $fila['id_boxeador'] ."' title='Delete Record' data-toggle='tooltip'><span class='fa fa-trash'></span></a>
			</td></tr>";
		}
		$listado = $listado."</tbody></table></div>";
		mysqli_close($conexion);

		return new soapval('return', 'xsd:string', $listado);

	}
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

	function agregarJuez($id, $nombre, $usuario, $contrasena, $foto)
	{
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		
		$agregar = $conexion->query("INSERT INTO jueces(id, nombre, usuario, contrasena, foto) VALUES ('$id','$nombre','$usuario','$contrasena','$foto')");
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

		$listado = "<div class='opacity' id='div1'><table table-responsive{-sm|-md|-lg|-xl} class='table table-bordered table-striped table-dark' ><thead><tr><th>ID</th><th>Foto</th><th>Nombre</th><th>usuario</th><th>Contraseña</th><th>Funciones</th></tr></thead><tbody>";
		while ($fila = mysqli_fetch_array($resultado)){
				$listado = $listado."<tr><td>".$fila['id']."</td><td><img src='".$fila['foto']."' width='75' height='75' style= 'border-radius: 50%;'/></td><td>".$fila['nombre']."</td><td>".$fila['usuario']
				."</td><td>".$fila['contrasena']."</td><td>
				<a href='../controllers/soap_clients/cliente_jueces_leer.php?id=". $fila['id'] ."' title='View Record' data-toggle='tooltip'><span class='fa fa-eye'></span></a>
				<a href='../controllers/soap_clients/cliente_jueces_actualizar.php?id=". $fila['id'] ."' title='Update Record' data-toggle='tooltip'><span class='fa fa-pencil'></span></a>
				<a href='../controllers/soap_clients/cliente_jueces_elimina.php?id=". $fila['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='fa fa-trash'></span></a>
				</td></tr>";
		}
		$listado = $listado."</tbody></table></div>";
		mysqli_close($conexion);

		return new soapval('return', 'xsd:string', $listado);

	}

	$servicio->service(file_get_contents("php://input"));
?>