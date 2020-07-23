<?php
require_once('../connection.php');

function get_juez($conn , $term){	
	$query = "SELECT * FROM jueces WHERE nombre LIKE '%".$term."%' ORDER BY nombre ASC";
	$result = mysqli_query($conn, $query);	
	$data = mysqli_fetch_all($result,MYSQLI_ASSOC);
	return $data;	
}

if (isset($_GET['term'])) {
	$getJuez = get_juez($conn, $_GET['term']);
	$juezList = array();
	foreach($getJuez as $juez){
		$juezList[] = $juez['nombre'];
	}
	echo json_encode($juezList);
}
?>