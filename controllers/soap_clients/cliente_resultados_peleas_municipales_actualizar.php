<?php
require_once('lib/nusoap.php');
// Define variables and initialize with empty values
$id = $aliasb1 = $aliasb2 = $peso = $aliasganador ="";
$id_err = $aliasb1_err = $aliasb2_err = $peso_err = $aliasganador_err ="";
 
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate aliasb1
    $input_aliasb1 = trim($_POST["aliasb1"]);
    if(empty($input_aliasb1)){
        $aliasb1_err = "Ingresa el aliasb1.";
    } 
    else{
        $aliasb1 = $input_aliasb1;
    }
	
	// Validate aliasb2
    $input_aliasb2 = trim($_POST["aliasb2"]);
    if(empty($input_aliasb2)){
        $aliasb2_err = "Ingresa el aliasb2.";
    } 
    else{
        $aliasb2 = $input_aliasb2;
    }
	
    // Validate peso   
    $input_peso = trim($_POST["peso"]);
    if(empty($input_peso)){
        $peso_err = "Ingresa el peso.";
    }else{
        $peso = $input_peso;
    }
	
	// Validate aliasganador   
    $input_aliasganador = trim($_POST["aliasganador"]);
    if(empty($input_aliasganador)){
        $aliasganador_err = "Ingresa el alias del ganador.";
    }else{
        $aliasganador = $input_aliasganador;
    }
    
    // Check input errors before inserting in database
	//$id_err = $categoria_err = $id_juez1_err = $id_juez2_err = $id_juez3_err = $id_juez4_err = $id_boxeador1_err = $id_boxeador2_err = $fecha_err = $hora_err
    if(empty($id_err) && empty($aliasb1_err) && empty($aliasb2_err) && empty($peso_err) && empty($aliasganador_err)){
        $cliente = new nusoap_client("http://localhost/BOMV/ws_soap/ws_peleas_municipales.php");
		//id, categoria, id_juez1, id_juez2, id_juez3, id_juez4, id_boxeador1, id_boxeador2, fecha, hora
		$datos = array('id' => $_POST["id"], 'aliasb1' => $_POST["aliasb1"], 'aliasb2' => $_POST["aliasb2"], 'peso' => $_POST["peso"], 'aliasganador' => $_POST["aliasganador"]);

		$resultado = $cliente->call('editarResultadoPeleaMunicipal', $datos);
		
		$err = $cliente->getError();
		if($err){
			echo '<h2>Error del constructor</h2><pre>'.$err.'</pre>';
			echo '<h2>Request</h2><pre>'.htmlspecialchars($cliente->request, ENT_QUOTES).'</pre>';
			echo '<h2>Response</h2><pre>'.htmlspecialchars($cliente->response, ENT_QUOTES).'</pre>';
			echo '<h2>Debug</h2><pre>'.htmlspecialchars($cliente->getDebug(), ENT_QUOTES).'</pre>';
		}else{
			header("location: ../../views/resultados_peleas_municipales.php");
		}
    }
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        $cliente2 = new nusoap_client("http://localhost/BOMV/ws_soap/ws_peleas_municipales.php");

        $datos = array('id' => $id);

		$resultado = $cliente2->call('buscarResultadoPeleaMunicipal', $datos);
		
		$err = $cliente2->getError();
		if($err){
			echo '<h2>Error del constructor</h2><pre>'.$err.'</pre>';
			echo '<h2>Request</h2><pre>'.htmlspecialchars($cliente2->request, ENT_QUOTES).'</pre>';
			echo '<h2>Response</h2><pre>'.htmlspecialchars($cliente2->response, ENT_QUOTES).'</pre>';
			echo '<h2>Debug</h2><pre>'.htmlspecialchars($cliente2->getDebug(), ENT_QUOTES).'</pre>';
        }
        else
        {
            $array = explode("<", $resultado);
			$aliasb1 = $array[1];
        	$aliasb2 = $array[2];
        	$peso = $array[3];
        	$aliasganador = $array[4];
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
    <title>Actualizar gimnasio</title>
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
                        <h2>Actualizar el resultado de la pelea municipal</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    	<div class="form-group <?php echo (!empty($aliasb1_err)) ? 'has-error' : ''; ?>">
                            <label>Alias b1</label>
                            <input type="text" name="aliasb1" class="form-control" value="<?php echo $aliasb1; ?>">
                            <span class="help-block"><?php echo $aliasb1_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($aliasb2_err)) ? 'has-error' : ''; ?>">
                            <label>Alias b2</label>
                            <input type="text" name="aliasb2" class="form-control" value="<?php echo $aliasb2; ?>" placeholder="">
                            <span class="help-block"><?php echo $aliasb2_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($peso_err)) ? 'has-error' : ''; ?>">
                            <label>Peso</label>
                            <input type="text" name="peso" class="form-control" value="<?php echo $peso; ?>">
                            <span class="help-block"><?php echo $peso_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($aliasganador_err)) ? 'has-error' : ''; ?>">
                            <label>Alias ganador</label>
                            <input type="text" name="aliasganador" class="form-control" value="<?php echo $aliasganador; ?>">
                            <span class="help-block"><?php echo $aliasganador_err;?></span>
                        </div>

                        
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Guardar Pelea Municipal">
                        <a href="../../views/resultados_peleas_municipales.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>