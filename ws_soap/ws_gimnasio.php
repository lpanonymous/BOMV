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

	//Tablas de peleas
	$servicio->register("agregarTablaPelea", array('id' => 'xsd:string', 'id_juez' => 'xsd:string', 'id_pelea' => 'xsd:string', 'id_boxeador' => 'xsd:string', 'round1' => 'xsd:string', 'round2' => 'xsd:string', 'round3' => 'xsd:string', 'round4' => 'xsd:string', 'round5' => 'xsd:string', 'round6' => 'xsd:string', 'round7' => 'xsd:string', 'round8' => 'xsd:string', 'round9' => 'xsd:string', 'round10' => 'xsd:string', 'round11' => 'xsd:string', 'round12' => 'xsd:string', 'total_puntos' => 'xsd:string', 'num_jabs' => 'xsd:string', 'num_power' => 'xsd:string', 'total_golpes' => 'xsd:string', 'ganador' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register("editarTablaPelea", array('id' => 'xsd:string', 'id_juez' => 'xsd:string', 'id_pelea' => 'xsd:string', 'id_boxeador' => 'xsd:string', 'round1' => 'xsd:string', 'round2' => 'xsd:string', 'round3' => 'xsd:string', 'round4' => 'xsd:string', 'round5' => 'xsd:string', 'round6' => 'xsd:string', 'round7' => 'xsd:string', 'round8' => 'xsd:string', 'round9' => 'xsd:string', 'round10' => 'xsd:string', 'round11' => 'xsd:string', 'round12' => 'xsd:string', 'total_puntos' => 'xsd:string', 'num_jabs' => 'xsd:string', 'num_power' => 'xsd:string', 'total_golpes' => 'xsd:string', 'ganador' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register("eliminarTablaPelea", array('id' => 'xsd:string'), array('return' => 'xsd:string'), $ns);
	$servicio->register('buscarTablaPelea',array('id' => 'xsd:string'), array('return' => 'xsd:string'),$ns);
	$servicio->register('mostrarTablasPeleas', array(), array('return' => 'xsd:string'), $ns);


	function buscarGimnasio($id) 
	{
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");	
		$sql = "SELECT * FROM gimnasio where id='$id'";
		$resultado = mysqli_query($conexion, $sql);

		while ($fila = mysqli_fetch_array($resultado))
		{
			$datos = array("id" => $fila['id'], "nombre" => $fila['nombre'], "ubicacion" => $fila['ubicacion'], "telefono" => $fila['telefono'], "facebook" => $fila['facebook'], "email" => $fila['email'], "descripcion" => $fila['descripcion'], "foto" => $fila['foto']);	
		}
		mysqli_close($conexion);
		$datos2 = implode("<", $datos);

		return $datos2;

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
		mysqli_close($conexion);
		$datos2 = implode("<", $datos);

		return $datos2;

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

	function buscarTablaPelea($id) 
	{
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");	
		$sql = "SELECT * FROM tabla_de_pelea where id='$id'";
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
						   "ganador" => $fila['ganador?']
						);	
		}
		$juezJSON=json_encode($datos);
		$juezJSON2=json_decode($juezJSON, true);
		$data = serialize($juezJSON2);
		return $data;

	}

	function agregarTablaPelea($id, $id_juez, $id_pelea, $id_boxeador, $round1, $round2, $round3, $round4, $round5, $round6, $round7, $round8, $round9, $round10, $round11, $round12, $total_puntos, $num_jabs, $num_power, $total_golpes, $ganador)
	{
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		
		$agregar = $conexion->query("INSERT INTO tabla_de_pelea(id, id_juez, id_pelea, id_boxeador, round1, round2, round3, round4, round5, round6, round7, round8, round9, round10, round11, round12, total_puntos, num_jabs, num_power, total_golpes, ganador?) VALUES ('$id','$id_juez','$id_pelea','$id_boxeador','$round1','$round2','$round3','$round4','$round5','$round6','$round7','$round8','$round9','$round10','$round11','$round12','$total_puntos','$num_jabs','$num_power','$total_golpes','$ganador')");
		$resultado=mysqli_query($conexion, $agregar);
		if(!$conexion) {
			return "Error en la conexion";
			exit();
		}
		return "Registro insertado";
		mysqli_close($conexion);
	}

	function editarTablaPelea($id, $id_juez, $id_pelea, $id_boxeador, $round1, $round2, $round3, $round4, $round5, $round6, $round7, $round8, $round9, $round10, $round11, $round12, $total_puntos, $num_jabs, $num_power, $total_golpes, $ganador){
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		$editar = $conexion->query("UPDATE tabla_de_pelea SET id='$id',id_juez='$id_juez',id_pelea='$id_pelea',id_boxeador='$id_boxeador',round1='$round1',round2='$round2',round3='$round3',round4='$round4',round5='$round5',round6='$round6',round7='$round7',round8='$round8',round9='$round9',round10='$round10',round11='$round11',round12='$round12',total_puntos='$total_puntos',num_jabs='$num_jabs',num_power='$num_power',total_golpes='$total_golpes',ganador?='$ganador'  WHERE id='$id'");
		$resultado=mysqli_query($conexion, $editar);

		if(!$conexion) {
			return "Error en la conexion";
			exit();
		}
		return "Registro actualizado";
		mysqli_close($conexion);
	}

	function eliminarTablaPelea($id) {
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		$eliminar = "DELETE FROM tabla_de_pelea WHERE id='$id'";
		$resultado=mysqli_query($conexion, $eliminar);

		if(!$conexion) {
			return "Error en la conexion";
			exit();
		}
		return "Registro eliminado";
		mysqli_close($conexion);
	}

	function mostrarTablasPeleas() 
	{
		$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");
		$sql = "SELECT * FROM tabla_de_pelea";
		$resultado = mysqli_query($conexion, $sql);

		$listado = "<div class='opacity' id='div1'><table table-responsive{-sm|-md|-lg|-xl} class='table table-bordered table-striped table-dark' ><thead><tr><th>Id</th><th>Id juez</th><th>Id pelea</th><th>Id boxeador</th><th>round1</th><th>round2</th><th>round3</th><th>round4</th><th>round5</th><th>round6</th><th>round7</th><th>round8</th><th>round9</th><th>round10</th><th>round11</th><th>round12</th><th>Total puntos</th><th>Número de jabs</th><th>Num power</th><th>Total de golpes</th><th>Ganador?</th><th>Funciones</th></tr></thead><tbody>";
		while ($fila = mysqli_fetch_array($resultado)){
				$listado = $listado.
				"<tr>
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
					"</td><td>".$fila['ganador?'].
					"</td><td><a href='../controllers/soap_clients/cliente_jueces_leer.php?id=". $fila['id'] ."' title='View Record' data-toggle='tooltip'><span class='fa fa-eye'></span></a>
					<a href='../controllers/soap_clients/cliente_jueces_actualizar.php?id=". $fila['id'] ."' title='Update Record' data-toggle='tooltip'><span class='fa fa-pencil'></span></a>
					<a href='../controllers/soap_clients/cliente_jueces_elimina.php?id=". $fila['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='fa fa-trash'></span></a>
					</td>
				</tr>";
		}
		$listado = $listado."</tbody></table></div>";
		mysqli_close($conexion);

		return new soapval('return', 'xsd:string', $listado);

	}

	$servicio->service(file_get_contents("php://input"));
?>