<?php
require_once('../tools/connection.php');

function get_gimnasio($conn , $term){	
	$query = "SELECT * FROM gimnasio WHERE nombre LIKE '%".$term."%' ORDER BY nombre ASC";
	$result = mysqli_query($conn, $query);	
	$data = mysqli_fetch_all($result,MYSQLI_ASSOC);
	return $data;	
}

if (isset($_GET['term'])) {
	$getGimnasio = get_gimnasio($conn, $_GET['term']);
	$gimnasioList = array();
	foreach($getGimnasio as $gimnasio){
		$gimnasioList[] = $gimnasio['nombre'];
	}
	echo json_encode($gimnasioList);
}
?>