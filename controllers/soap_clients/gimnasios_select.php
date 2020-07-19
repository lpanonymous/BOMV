<?php
//fetch.php
require ('../../functions/conexion/conexion.php');
$output = '';

if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conexion, $_POST["query"]);
 $query = "
    SELECT * FROM analisispastas 
  WHERE IdAnalisisPastas LIKE '%".$search."%' OR
  Fecha LIKE '%".$search."%'
 ";
}
else
{
    $query = "
    SELECT * FROM analisispastas ORDER BY IdAnalisisPastas";
    
}
$result = mysqli_query($conexion, $query);
if ($result == true){
	if(mysqli_num_rows($result) > 0){
		if (isset($_POST["idAnalisisPastas"])){
			while($row = mysqli_fetch_array($result)){
				  if ($row["IdAnalisisPastas"] == $_POST["idAnalisisPastas"]){
					$output .= '
					  <option class="dropdown-item" value='.$row["IdAnalisisPastas"].' selected>'.$row["IdAnalisisPastas"].".- ".$row["Utme"]." - ".$row["Utmn"]." - ".$row["Latitud"]." - ".$row["Bolsa"]." - ".$row["Patron"]." - ".$row["Analizo"].'</option>';
				  } else {
					$output .= '
					  <option class="dropdown-item" value='.$row["IdAnalisisPastas"].'>'.$row["IdAnalisisPastas"].".- ".$row["Utme"]." - ".$row["Utmn"]." - ".$row["Latitud"]." - ".$row["Bolsa"]." - ".$row["Patron"]." - ".$row["Analizo"].'</option>';
				  }
			}
		  } else {
			while($row = mysqli_fetch_array($result)){
				$output .= '
				<option class="dropdown-item" value='.$row["IdAnalisisPastas"].'>'.$row["IdAnalisisPastas"].".- ".$row["Utme"]." - ".$row["Utmn"]." - ".$row["Latitud"]." - ".$row["Bolsa"]." - ".$row["Patron"]." - ".$row["Analizo"].'</option>';
			}
		  }
		 echo $output;
	} else {
	 echo 'No hay resultados para esa busqueda';
	}
} else {
	echo 'Error de conexion con la base de datos';
}


?>