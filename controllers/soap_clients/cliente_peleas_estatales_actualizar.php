<?php
require_once('lib/nusoap.php');
// Define variables and initialize with empty values
$id = $categoria = $id_juez1 = $id_juez2 = $id_juez3 = $id_juez4 = $id_boxeador1 = $id_boxeador2 = $fecha = $hora ="";
$id_err = $categoria_err = $id_juez1_err = $id_juez2_err = $id_juez3_err = $id_juez4_err = $id_boxeador1_err = $id_boxeador2_err = $fecha_err = $hora_err ="";
 
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate categoria
    $input_categoria = trim($_POST["categoria"]);
    if(empty($input_categoria)){
        $categoria_err = "Ingresa la categoria de la pelea.";
    } 
    else{
        $categoria = $input_categoria;
    }

    // Validate id_juez1   
    $input_id_juez1 = trim($_POST["id_juez1"]);
    if(empty($input_id_juez1)){
        $id_juez1_err = "Ingresa el id del juez 1.";
    }else{
        $id_juez1 = $input_id_juez1;
    }
	
	// Validate id_juez2   
    $input_id_juez2 = trim($_POST["id_juez2"]);
    if(empty($input_id_juez2)){
        $id_juez2_err = "Ingresa el id del juez 2.";
    }else{
        $id_juez2 = $input_id_juez2;
    }
    
	// Validate id_juez3   
    $input_id_juez3 = trim($_POST["id_juez3"]);
    if(empty($input_id_juez3)){
        $id_juez3_err = "Ingresa el id del juez 3.";
    }else{
        $id_juez3 = $input_id_juez3;
    }
	
	// Validate id_juez4   
    $input_id_juez4 = trim($_POST["id_juez4"]);
    if(empty($input_id_juez4)){
        $id_juez4_err = "Ingresa el id del juez 4.";
    }else{
        $id_juez4 = $input_id_juez4;
    }
	
    // Validate id_boxeador1   
    $input_id_boxeador1 = trim($_POST["id_boxeador1"]);
    if(empty($input_id_boxeador1)){
        $id_boxeador1_err = "Ingresa el id del boxeador 1.";
    }else{
        $id_boxeador1 = $input_id_boxeador1;
    }
	
	// Validate id_boxeador2   
    $input_id_boxeador2 = trim($_POST["id_boxeador2"]);
    if(empty($input_id_boxeador2)){
        $id_boxeador2_err = "Ingresa el id del boxeador 2.";
    }else{
        $id_boxeador2 = $input_id_boxeador2;
    }
	
	// Validate fecha   
    $input_fecha = trim($_POST["fecha"]);
    if(empty($input_fecha)){
        $fecha_err = "Ingresa la fecha de la pelea.";
    }else{
        $fecha = $input_fecha;
    }
	
	// Validate hora   
    $input_hora = trim($_POST["hora"]);
    if(empty($input_hora)){
        $hora_err = "Ingresa la hora de la pelea.";
    }else{
        $hora = $input_hora;
    }
	
    // Check input errors before inserting in database
	//$id_err = $categoria_err = $id_juez1_err = $id_juez2_err = $id_juez3_err = $id_juez4_err = $id_boxeador1_err = $id_boxeador2_err = $fecha_err = $hora_err
    if(empty($id_err) && empty($categoria_err) && empty($id_juez1_err) && empty($id_juez2_err) && empty($id_juez3_err) && empty($id_juez4_err) && empty($id_boxeador1_err) && empty($id_boxeador2_err) && empty($fecha_err) && empty($hora_err)){
        $cliente = new nusoap_client("http://localhost/BOMV/ws_soap/ws_peleas_estatales.php");
		//id, categoria, id_juez1, id_juez2, id_juez3, id_juez4, id_boxeador1, id_boxeador2, fecha, hora
		$datos = array('id' => $_POST["id"], 'categoria' => $_POST["categoria"], 'id_juez1' => $_POST["id_juez1"], 'id_juez2' => $_POST["id_juez2"], 'id_juez3' => $_POST["id_juez3"], 'id_juez4' => $_POST["id_juez4"], 'id_boxeador1' => $_POST["id_boxeador1"], 'id_boxeador2' => $_POST["id_boxeador2"], 'fecha' => $_POST["fecha"], 'hora' => $_POST["hora"]);

		$resultado = $cliente->call('editarPeleaEstatal', $datos);
		
		$err = $cliente->getError();
		if($err){
			echo '<h2>Error del constructor</h2><pre>'.$err.'</pre>';
			echo '<h2>Request</h2><pre>'.htmlspecialchars($cliente->request, ENT_QUOTES).'</pre>';
			echo '<h2>Response</h2><pre>'.htmlspecialchars($cliente->response, ENT_QUOTES).'</pre>';
			echo '<h2>Debug</h2><pre>'.htmlspecialchars($cliente->getDebug(), ENT_QUOTES).'</pre>';
		}else{
			header("location: ../../views/peleas_estatales.php");
		}
    }
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        $cliente2 = new nusoap_client("http://localhost/BOMV/ws_soap/ws_peleas_estatales.php");

        $datos = array('id' => $id);

		$resultado = $cliente2->call('buscarPeleaEstatal', $datos);
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
            $id = $obj->id;
            $categoria = $obj->categoria;
            $id_juez1 = $obj->id_juez1;
            $id_juez2 = $obj->id_juez2;
            $id_juez3 = $obj->id_juez3;
            $id_juez4 = $obj->id_juez4;
            $id_boxeador1 = $obj->id_boxeador1;
            $id_boxeador2 = $obj->id_boxeador2;
            $fecha = $obj->fecha;
            $hora = $obj->hora;
		}
        
    }  else{    
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
    <title>Actualizar Pelea Estatal</title>
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
                        <h2>Actualizar pelea estatal</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <!--$id = $categoria = $id_juez1 = $id_juez2 = $id_juez3 = $id_juez4 = $id_boxeador1 = $id_boxeador2 = $fecha = $hora ="";
$id_err = $categoria_err = $id_juez1_err = $id_juez2_err = $id_juez3_err = $id_juez4_err = $id_boxeador1_err = $id_boxeador2_err = $fecha_err = $hora_err ="";-->
                    <div class="form-group <?php echo (!empty($categoria_err)) ? 'has-error' : ''; ?>">
                            <label>Categoria</label>
                            <!--<input type="text" name="categoria" class="form-control" value="</*?php echo $categoria; ?*/>">-->
                            <select class="form-control" value="<?php echo $categoria; ?>" id="" name="categoria">
                            	<!--<option selected="true" name="categoria" disabled="disabled" value="">Selecciona el peso</option>-->
								<option name="categoria" value="Minimosca">Minimosca</option>
								<option name="categoria" value="Mosca">Mosca</option>
								<option name="categoria" value="Gallo">Gallo</option>
								<option name="categoria" value="Liviano">Liviano</option>
								<option name="categoria" value="Welter Junior">Welter Junior</option>
								<option name="categoria" value="Welter">Welter</option>
								<option name="categoria" value="Medio">Medio</option>
								<option name="categoria" value="Semipesado">Semipesado</option>
								<option name="categoria" value="Pesado">Pesado</option>
								<option name="categoria" value="Superpesado">Superpesado</option>
							</select>
                            <span class="help-block"><?php echo $categoria_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($id_juez1_err)) ? 'has-error' : ''; ?>">
                            <label>Id juez1</label>
                            <input type="text" name="id_juez1" class="form-control" value="<?php echo $id_juez1; ?>" placeholder="">
                            <span class="help-block"><?php echo $id_juez1_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($id_juez2_err)) ? 'has-error' : ''; ?>">
                            <label>Id juez2</label>
                            <input type="text" name="id_juez2" class="form-control" value="<?php echo $id_juez2; ?>">
                            <span class="help-block"><?php echo $id_juez2_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($id_juez3_err)) ? 'has-error' : ''; ?>">
                            <label>Id juez3</label>
                            <input type="text" name="id_juez3" class="form-control" value="<?php echo $id_juez3; ?>">
                            <span class="help-block"><?php echo $id_juez3_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($id_juez4_err)) ? 'has-error' : ''; ?>">
                            <label>Id juez4</label>
                            <input type="text" name="id_juez4" class="form-control" value="<?php echo $id_juez4; ?>">
                            <span class="help-block"><?php echo $id_juez4_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($id_boxeador1_err)) ? 'has-error' : ''; ?>">
                            <label>Id boxeador1</label>
                            <input type="text" name="id_boxeador1" class="form-control" value="<?php echo $id_boxeador1; ?>">
                            <span class="help-block"><?php echo $id_boxeador1_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($id_boxeador1_err)) ? 'has-error' : ''; ?>">
                            <label>Id boxeador2</label>
                            <input type="text" name="id_boxeador2" class="form-control" value="<?php echo $id_boxeador2; ?>" placeholder="">
                            <span class="help-block"><?php echo $id_boxeador1_err;?></span>
                        </div>
                        
                        <div class="form-group <?php echo (!empty($id_fecha_err)) ? 'has-error' : ''; ?>">
                            <label>Fecha de la pelea</label>
                            <input type="date" name="fecha" class="form-control" value="<?php echo $fecha; ?>">
                            <span class="help-block"><?php echo $fecha_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($hora_err)) ? 'has-error' : ''; ?>">
                            <label>Hora de la pelea</label>
                            <input type="time" name="hora" class="form-control" value="<?php echo $hora; ?>" placeholder="">
                            <span class="help-block"><?php echo $hora_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Guardar Pelea Estatal">
                        <a href="../../views/peleas_estatales.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>