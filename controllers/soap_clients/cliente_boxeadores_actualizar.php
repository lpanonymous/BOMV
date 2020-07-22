<?php
require_once('lib/nusoap.php');
// Define variables and initialize with empty values
    $id = 
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

    $id_err = 
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
if(isset($_POST["id"]) && !empty($_POST["id"])){
        // Get hidden input value
        $id = $_POST["id"];
    
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

        $input_foto = trim($_POST["foto"]);
		if(empty($input_foto)){
			$foto_err = "Porfavor ingresa una foto.";
		} 
		else{
			$foto = $input_foto;
        }
    
    // Check input errors before inserting in database
    if(empty($id_err) && empty($id_gimnasio_err) && empty($alias_err) && empty($nombre_boxeador_err) && empty($total_peleas_err) && empty($peleas_ganadas_err) && empty($peleas_ganadas_ko_err) && empty($peleas_perdidas_err) && empty($peleas_perdidas_ko_err) && empty($empates_err) && empty($categoria_err) && empty($division_err) && empty($peso_err) && empty($altura_err) && empty($estado_err) && empty($ciudad_err) && empty($municipio_err) && empty($foto_err)){
        $cliente = new nusoap_client("http://localhost/BOMV/ws_soap/ws_gimnasio.php");

		$datos = array('id_boxeador' => $_POST["id"], 
                           'id_gimnasio' => $_POST["id_gimnasio"], 
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
                           'foto' => $_POST["foto"]
                            );

		$resultado = $cliente->call('editarBoxeador', $datos);
		
		$err = $cliente->getError();
		if($err){
			echo '<h2>Error del constructor</h2><pre>'.$err.'</pre>';
			echo '<h2>Request</h2><pre>'.htmlspecialchars($cliente->request, ENT_QUOTES).'</pre>';
			echo '<h2>Response</h2><pre>'.htmlspecialchars($cliente->response, ENT_QUOTES).'</pre>';
			echo '<h2>Debug</h2><pre>'.htmlspecialchars($cliente->getDebug(), ENT_QUOTES).'</pre>';
		}else{
			header("location: ../../views/boxeadores.php");
		}
    }
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        $cliente2 = new nusoap_client("http://localhost/BOMV/ws_soap/ws_gimnasio.php");

        $datos = array('id' => $id);

		$resultado = $cliente2->call('buscarBoxeador', $datos);
        $array = unserialize($resultado);
        //print_r($array);
        $json = json_encode($array);
        $obj = json_decode($json);
	    $err = $cliente2->getError();
		if($err){
			echo '<h2>Error del constructor</h2><pre>'.$err.'</pre>';
			echo '<h2>Request</h2><pre>'.htmlspecialchars($cliente2->request, ENT_QUOTES).'</pre>';
			echo '<h2>Response</h2><pre>'.htmlspecialchars($cliente2->response, ENT_QUOTES).'</pre>';
			echo '<h2>Debug</h2><pre>'.htmlspecialchars($cliente2->getDebug(), ENT_QUOTES).'</pre>';
        }
        else
        {
            $id_gimnasio = $obj->id_gimnasio;
            $alias = $obj->alias;
            $nombre_boxeador = $obj->nombre_boxeador;
            $total_peleas = $obj->total_peleas;
            $peleas_ganadas = $obj->peleas_ganadas;
            $peleas_ganadas_ko = $obj->peleas_ganadas_ko;
            $peleas_perdidas = $obj->peleas_perdidas;
            $peleas_perdidas_ko = $obj->peleas_perdidas_ko;
            $empates = $obj->empates;
            $categoria = $obj->categoria;
            $division = $obj->division;
            $peso = $obj->peso;
            $altura = $obj->altura;
            $estado = $obj->estado;
            $ciudad = $obj->ciudad;
            $municipio = $obj->municipio;
            $foto = $obj->foto;
		}
        
    }  
    else{    
        // URL doesn't contain valid id. Redirect to error page
        header("location: ../error.php");
        exit();
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Actualizar boxeador</title>
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
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Actualizar boxeador</h2>
                    </div>
                    <p>Porfavor ingresa los datos y luego da clic en actualizar boxeador.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($id_gimnasio_err)) ? 'has-error' : ''; ?>">
                            <label>Id gimnasio</label>
                            <!--<input type="text" name="id_gimnasio" class="form-control" value="</*?php echo $id_gimnasio;?>">-->
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
                            <input type="text" name="alias" class="form-control" value="<?php echo $alias; ?>">
                            <span class="help-block"><?php echo $alias_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($nombre_boxeador_err)) ? 'has-error' : ''; ?>">
                            <label>Nombre boxeador</label>
                            <input type="text" name="nombre_boxeador" class="form-control" value="<?php echo $nombre_boxeador; ?>">
                            <span class="help-block"><?php echo $nombre_boxeador_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($total_peleas_err)) ? 'has-error' : ''; ?>">
                            <label>Total de peleas</label>
                            <input type="text" name="total_peleas" class="form-control" value="<?php echo $total_peleas; ?>">
                            <span class="help-block"><?php echo $total_peleas_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($peleas_ganadas_err)) ? 'has-error' : ''; ?>">
                            <label>#Pelas ganadas</label>
                            <input type="text" name="peleas_ganadas" class="form-control" value="<?php echo $peleas_ganadas; ?>">
                            <span class="help-block"><?php echo $peleas_ganadas_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($peleas_ganadas_ko_err)) ? 'has-error' : ''; ?>">
                            <label>#Peleas ganadas por k.o</label>
                            <input type="text" name="peleas_ganadas_ko" class="form-control" value="<?php echo $peleas_ganadas_ko; ?>">
                            <span class="help-block"><?php echo $peleas_ganadas_ko_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($peleas_perdidas_err)) ? 'has-error' : ''; ?>">
                            <label>#Peleas perdidas</label>
                            <input type="text" name="peleas_perdidas" class="form-control" value="<?php echo $peleas_perdidas; ?>">
                            <span class="help-block"><?php echo $peleas_perdidas_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($peleas_perdidas_ko_err)) ? 'has-error' : ''; ?>">
                            <label>#Peleas perdidas por k.o</label>
                            <input type="text" name="peleas_perdidas_ko" class="form-control" value="<?php echo $peleas_perdidas_ko; ?>">
                            <span class="help-block"><?php echo $peleas_perdidas_ko_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($empates_err)) ? 'has-error' : ''; ?>">
                            <label>Empates</label>
                            <input type="text" name="empates" class="form-control" value="<?php echo $empates; ?>">
                            <span class="help-block"><?php echo $empates_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($categoria_err)) ? 'has-error' : ''; ?>">
                            <label>Categoria</label>
                            <input type="text" name="categoria" class="form-control" value="<?php echo $categoria; ?>">
                            <span class="help-block"><?php echo $categoria_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($division_err)) ? 'has-error' : ''; ?>">
                            <label>División</label>
                            <input type="text" name="division" class="form-control" value="<?php echo $division; ?>">
                            <span class="help-block"><?php echo $division_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($peso_err)) ? 'has-error' : ''; ?>">
                            <label>Peso</label>
                            <input type="text" name="peso" class="form-control" value="<?php echo $peso; ?>">
                            <span class="help-block"><?php echo $peso_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($altura_err)) ? 'has-error' : ''; ?>">
                            <label>Altura</label>
                            <input type="text" name="altura" class="form-control" value="<?php echo $altura; ?>">
                            <span class="help-block"><?php echo $altura_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($estado_err)) ? 'has-error' : ''; ?>">
                            <label>Estado</label>
                            <input type="text" name="estado" class="form-control" value="<?php echo $estado; ?>">
                            <span class="help-block"><?php echo $estado_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($ciudad_err)) ? 'has-error' : ''; ?>">
                            <label>Ciudad</label>
                            <input type="text" name="ciudad" class="form-control" value="<?php echo $ciudad; ?>">
                            <span class="help-block"><?php echo $ciudad_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($municipio_err)) ? 'has-error' : ''; ?>">
                            <label>Municipio</label>
                            <input type="text" name="municipio" class="form-control" value="<?php echo $municipio; ?>">
                            <span class="help-block"><?php echo $municipio_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($foto_err)) ? 'has-error' : ''; ?>">
                            <label>Foto</label>
                            <input type="text" name="foto" class="form-control" value="<?php echo $foto; ?>">
                            <span class="help-block"><?php echo $foto_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Actualizar boxeador">
                        <a href="../../views/boxeadores.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>