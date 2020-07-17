<?php
require_once('connection.php');

function get_boxeador($conn , $term){	
	$query = "SELECT * FROM boxeadores WHERE alias LIKE '%".$term."%' ORDER BY alias ASC";
	$result = mysqli_query($conn, $query);	
	$data = mysqli_fetch_all($result,MYSQLI_ASSOC);
	return $data;	
}

if (isset($_GET['term'])) {
	$getBoxeador = get_boxeador($conn, $_GET['term']);
	$boxeadorList = array();
	foreach($getBoxeador as $boxeador){
		$boxeadorList[] = $boxeador['alias'];
	}
	echo json_encode($boxeadorList);
}
?>