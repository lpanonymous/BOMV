<?php
	require 'conexion.php';
	//function getListaGimnasios(){
		$conexion = conexion();
		$query = 'SELECT * FROM gimnasio';
		$result = $conexion->query($query);
		$listas = '<option value="0">Elige una opción</option>';
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$listas .= '<option value='.$row["id"].'>'.$row["nombre"].'</option>';
		}
		return $listas;
	//}
	//echo getListaGimnasios();
?>