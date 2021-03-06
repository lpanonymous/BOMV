<?php
	require_once('lib/nusoap.php');

	// Define variables and initialize with empty values 
    $id_gimnasio = 
    $alias = 
    $nombre_boxeador = 
    $total_peleas = 
    $peleas_ganadas = 
    $peleas_ganadas_ko = 
    $peleas_perdidas = 
    $peleas_perdidas_ko = 
    $empates = 
    $categoria = 
    $division = 
    $peso = 
    $altura = 
    $estado = 
    $ciudad = 
    $municipio = 
    $foto ="";

    $id_gimnasio_err = 
    $alias_err = 
    $nombre_boxeador_err = 
    $total_peleas_err = 
    $peleas_ganadas_err = 
    $peleas_ganadas_ko_err = 
    $peleas_perdidas_err = 
    $peleas_perdidas_ko_err = 
    $empates_err = 
    $categoria_err = 
    $division_err = 
    $peso_err = 
    $altura_err = 
    $estado_err = 
    $ciudad_err = 
    $municipio_err = 
    $foto_err ="";
	
	// Processing form data when form is submitted
	if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $input_id_gimnasio = trim($_POST["id_gimnasio"]);
		if(empty($input_id_gimnasio)){
			$id_gimnasio_err = "Porfavor ingresa un id de gimnasio.";
		} 
		else{
			$id_gimnasio = $input_id_gimnasio;
        }
        
        $input_alias = trim($_POST["alias"]);
		if(empty($input_alias)){
			$alias_err = "Porfavor ingresa un alias.";
		} 
		else{
			$alias = $input_alias;
        }
        
        $input_nombre_boxeador = trim($_POST["nombre_boxeador"]);
		if(empty($input_nombre_boxeador)){
			$nombre_boxeador_err = "Porfavor ingresa un nombre de boxeador.";
		} 
		else{
			$nombre_boxeador = $input_nombre_boxeador;
        }
        
        $input_total_peleas = trim($_POST["total_peleas"]);
		if(empty($input_total_peleas)){
			$total_peleas_err = "Porfavor ingresa un total de peleas.";
		} 
		else{
			$total_peleas = $input_total_peleas;
        }
        
        $input_peleas_ganadas = trim($_POST["peleas_ganadas"]);
		if(empty($input_peleas_ganadas)){
			$peleas_ganadas_err = "Porfavor ingresa un total de peleas ganadas.";
		} 
		else{
			$peleas_ganadas = $input_peleas_ganadas;
        }
        
        $input_peleas_ganadas_ko = trim($_POST["peleas_ganadas_ko"]);
		if(empty($input_peleas_ganadas_ko)){
			$peleas_ganadas_ko_err = "Porfavor ingresa un total de peleas ganadas por k.o.";
		} 
		else{
			$peleas_ganadas_ko = $input_peleas_ganadas_ko;
        }
        
        $input_peleas_perdidas = trim($_POST["peleas_perdidas"]);
		if(empty($input_peleas_perdidas)){
			$peleas_perdidas_err = "Porfavor ingresa un total de peleas perdidas.";
		} 
		else{
			$peleas_perdidas = $input_peleas_perdidas;
        }

        $input_peleas_perdidas_ko = trim($_POST["peleas_perdidas_ko"]);
		if(empty($input_peleas_perdidas_ko)){
			$peleas_perdidas_ko_err = "Porfavor ingresa un total de peleas perdidas por k.o.";
		} 
		else{
			$peleas_perdidas_ko = $input_peleas_perdidas_ko;
        }

        $input_empates = trim($_POST["empates"]);
		if(empty($input_empates)){
			$empates_err = "Porfavor ingresa un total de peleas empatadas.";
		} 
		else{
			$empates = $input_empates;
        }

        $input_categoria = trim($_POST["categoria"]);
		if(empty($input_categoria)){
			$categoria_err = "Porfavor ingresa una categoria femenil(F) Masculina(M).";
		} 
		else{
			$categoria = $input_categoria;
        }

        $input_division = trim($_POST["division"]);
		if(empty($input_division)){
			$division_err = "Porfavor ingresa una división.";
		} 
		else{
			$division = $input_division;
        }

        $input_peso = trim($_POST["peso"]);
		if(empty($input_peso)){
			$peso_err = "Porfavor ingresa un peso en kg.";
		} 
		else{
			$peso = $input_peso;
        }

        $input_altura = trim($_POST["altura"]);
		if(empty($input_altura)){
			$altura_err = "Porfavor ingresa la altura en metros.";
		} 
		else{
			$altura = $input_altura;
        }

        $input_estado = trim($_POST["estado"]);
		if(empty($input_estado)){
			$estado_err = "Porfavor ingresa un estado del Pais.";
		} 
		else{
			$estado = $input_estado;
        }

        $input_ciudad = trim($_POST["ciudad"]);
		if(empty($input_ciudad)){
			$ciudad_err = "Porfavor ingresa una ciudad.";
		} 
		else{
			$ciudad = $input_ciudad;
        }

        $input_municipio = trim($_POST["municipio"]);
		if(empty($input_municipio)){
			$municipio_err = "Porfavor ingresa un municipio.";
		} 
		else{
			$municipio = $input_municipio;
        }

        /*$input_foto = trim($_POST["foto"]);
		if(empty($input_foto)){
			$foto_err = "Porfavor ingresa una foto.";
		} 
		else{
			$foto = $input_foto;
        }*/
	   $tmpfile = $_FILES["foto"]["tmp_name"];   // temp filename
       $filename = $_FILES["foto"]["name"];      // Original filename

       $handle = fopen($tmpfile, "r");                  // Open the temp file
       $contents = fread($handle, filesize($tmpfile));  // Read the temp file
       fclose($handle);                                 // Close the temp file

       $decodeContent   = base64_encode($contents);     // Decode the file content, so that we code send a binary string to SOAP
        
        // Check input errors before inserting in database
        if(empty($id_gimnasio_err) && empty($alias_err) && empty($nombre_boxeador_err) && empty($total_peleas_err) && empty($peleas_ganadas_err) && empty($peleas_ganadas_ko_err) && empty($peleas_perdidas_err) && empty($peleas_perdidas_ko_err) && empty($empates_err) && empty($categoria_err) && empty($division_err) && empty($peso_err) && empty($altura_err) && empty($estado_err) && empty($ciudad_err) && empty($municipio_err))
        {
            
			$cliente = new nusoap_client("http://localhost/BOMV/controllers/ws_soap/ws_boxeadores.php");

            $datos = array('id_gimnasio' => $_POST["id_gimnasio"], 
                           'alias' => $_POST["alias"], 
                           'nombre_boxeador' => $_POST["nombre_boxeador"], 
                           'total_peleas' => $_POST["total_peleas"], 
                           'peleas_ganadas' => $_POST["peleas_ganadas"], 
                           'peleas_ganadas_ko' => $_POST["peleas_ganadas_ko"], 
                           'peleas_perdidas' => $_POST["peleas_perdidas"],
                           'peleas_perdidas_ko' => $_POST["peleas_perdidas_ko"],
                           'empates' => $_POST["empates"],
                           'categoria' => $_POST["categoria"],
                           'division' => $_POST["division"],
                           'peso' => $_POST["peso"],
                           'altura' => $_POST["altura"],
                           'estado' => $_POST["estado"],
                           'ciudad' => $_POST["ciudad"],
                           'municipio' => $_POST["municipio"],
                           'foto' => $decodeContent, 'nombre_foto' => $filename);

			$resultado = $cliente->call('agregarBoxeador', $datos);
			header("location: ../../views/admin/boxeadores.php");
			//echo '<h2>Resultado</h2><pre>'; print_r($resultado); echo '</pre>';
        }
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Crear boxeador</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-18">
                    <div class="page-header">
                        <h2>Crear boxeador</h2>
                    </div>
                    <p>Porfavor ingresa los datos y luego da clic en agregar boxeador para almacenarlo en la base de datos.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group <?php echo (!empty($id_gimnasio_err)) ? 'has-error' : ''; ?>">
                            <label>Id gimnasio</label>
                            <!--<input type="text" name="id_gimnasio" class="form-control" value="</*?php echo $id_gimnasio; ?>*/">-->
                             <select id="lista_gimnasios" name="id_gimnasio" class="form-control" value="<?php echo $id_gimnasio;?>">
                             	<!--<option value="">Elige el Gimnasio</option>-->
                             	<?php
								 	//include("");
								 	$conexion = mysqli_connect("localhost", "root", "", "torneo_box_olimpico");	
								 	$query = "SELECT * FROM gimnasio ORDER BY id";	
								 	$result = mysqli_query($conexion, $query);
								 	if ($result == true){
										if(mysqli_num_rows($result) > 0){
								 			//$result = mysqli_query($gimnasios);
											while($row = mysqli_fetch_array($result)){	
												$id_gimnasio = $row['id'];
												$nombre = $row['nombre'];
										
								?>
								 		<option name="id_gimnasio" value="<?php echo $id_gimnasio;?>"><?php echo $nombre;?></option>
										<?php
										}
										}
									}
								 ?>
                             </select>
                            <span class="help-block"><?php echo $id_gimnasio_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($alias_err)) ? 'has-error' : ''; ?>">
                            <label>Alias</label>
                            <input type="text" name="alias" maxlength="100" minlength="0" class="form-control" value="<?php echo $alias; ?>">
                            <span class="help-block"><?php echo $alias_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($nombre_boxeador_err)) ? 'has-error' : ''; ?>">
                            <label>Nombre boxeador</label>
                            <input type="text" name="nombre_boxeador" maxlength="100" minlength="0" class="form-control" value="<?php echo $nombre_boxeador; ?>">
                            <span class="help-block"><?php echo $nombre_boxeador_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($total_peleas_err)) ? 'has-error' : ''; ?>">
                            <label>Total de peleas</label>
                            <input type="text" name="total_peleas" maxlength="11" minlength="0" class="form-control" value="<?php echo $total_peleas; ?>">
                            <span class="help-block"><?php echo $total_peleas_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($peleas_ganadas_err)) ? 'has-error' : ''; ?>">
                            <label>#Pelas ganadas</label>
                            <input type="text" name="peleas_ganadas" maxlength="11" minlength="0" class="form-control" value="<?php echo $peleas_ganadas; ?>">
                            <span class="help-block"><?php echo $peleas_ganadas_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($peleas_ganadas_ko_err)) ? 'has-error' : ''; ?>">
                            <label>#Peleas ganadas por k.o</label>
                            <input type="text" name="peleas_ganadas_ko" maxlength="11" minlength="0" class="form-control" value="<?php echo $peleas_ganadas_ko; ?>">
                            <span class="help-block"><?php echo $peleas_ganadas_ko_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($peleas_perdidas_err)) ? 'has-error' : ''; ?>">
                            <label>#Peleas perdidas</label>
                            <input type="text" name="peleas_perdidas" maxlength="11" minlength="0" class="form-control" value="<?php echo $peleas_perdidas; ?>">
                            <span class="help-block"><?php echo $peleas_perdidas_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($peleas_perdidas_ko_err)) ? 'has-error' : ''; ?>">
                            <label>#Peleas perdidas por k.o</label>
                            <input type="text" name="peleas_perdidas_ko" maxlength="11" minlength="0" class="form-control" value="<?php echo $peleas_perdidas_ko; ?>">
                            <span class="help-block"><?php echo $peleas_perdidas_ko_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($empates_err)) ? 'has-error' : ''; ?>">
                            <label>Empates</label>
                            <input type="text" name="empates" maxlength="11" minlength="0" class="form-control" value="<?php echo $empates; ?>">
                            <span class="help-block"><?php echo $empates_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($categoria_err)) ? 'has-error' : ''; ?>">
                            <label>Categoria</label>
                            <input type="text" name="categoria" maxlength="50" minlength="0" class="form-control" value="<?php echo $categoria; ?>">
                            <span class="help-block"><?php echo $categoria_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($division_err)) ? 'has-error' : ''; ?>">
                            <label>División</label>
                            <input type="text" name="division" maxlength="50" minlength="0" class="form-control" value="<?php echo $division; ?>">
                            <span class="help-block"><?php echo $division_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($peso_err)) ? 'has-error' : ''; ?>">
                            <label>Peso</label>
                            <input name="peso" type="number" pattern=".{0-9}" min="0.01" maxlength="10" minlength="0" step="0.01" class="form-control" value="<?php echo $peso; ?>">
                            <span class="help-block"><?php echo $peso_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($altura_err)) ? 'has-error' : ''; ?>">
                            <label>Altura</label>
                            <input type="number" pattern=".{0-9}" min="0.01" maxlength="10" minlength="0" step="0.01" name="altura" class="form-control" value="<?php echo $altura; ?>">
                            <span class="help-block"><?php echo $altura_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($estado_err)) ? 'has-error' : ''; ?>">
                            <label>Estado</label>
                            <input type="text" name="estado" maxlength="50" minlength="0" class="form-control" value="<?php echo $estado; ?>">
                            <span class="help-block"><?php echo $estado_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($ciudad_err)) ? 'has-error' : ''; ?>">
                            <label>Ciudad</label>
                            <input type="text" name="ciudad" maxlength="50" minlength="0" class="form-control" value="<?php echo $ciudad; ?>">
                            <span class="help-block"><?php echo $ciudad_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($municipio_err)) ? 'has-error' : ''; ?>">
                            <label>Municipio</label>
                            <input type="text" name="municipio" maxlength="50" minlength="0" class="form-control" value="<?php echo $municipio; ?>">
                            <span class="help-block"><?php echo $municipio_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($foto_err)) ? 'has-error' : ''; ?>">
                            <label>Foto</label>
                            <input type="file" name="foto" class="form-control" value="<?php echo $foto; ?>" multiple accept="image/*">
                            <span class="help-block"><?php echo $foto_err;?></span> 
                        </div>
                        <input type="submit" class="btn btn-primary" value="Agregar boxeador">
                        <a href="../../views/admin/boxeadores.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/"></script>
</body>
</html>