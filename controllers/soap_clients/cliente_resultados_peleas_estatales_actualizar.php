<?php
	require_once('lib/nusoap.php');
	// Define variables and initialize with empty values
	$id = $idb1 = $idb2 = $peso = $idganador ="";
	$id_err = $idb1_err = $idb2_err = $peso_err = $idganador_err ="";
 
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate idb1
    $input_idb1 = trim($_POST["idb1"]);
    if(empty($input_idb1)){
        $idb1_err = "Ingresa el idb1.";
    } 
    else{
        $idb1 = $input_idb1;
    }
	
	// Validate $idb2
    $input_idb2 = trim($_POST["idb2"]);
    if(empty($input_idb2)){
        $idb2_err = "Ingresa el idb2.";
    } 
    else{
        $idb2 = $input_idb2;
    }
	
    // Validate peso   
    $input_peso = trim($_POST["peso"]);
    if(empty($input_peso)){
        $peso_err = "Ingresa el peso.";
    }else{
        $peso = $input_peso;
    }
	
	// Validate idganador   
    $input_idganador = trim($_POST["idganador"]);
    if(empty($input_idganador)){
        $idganador_err = "Ingresa el id del ganador.";
    }else{
        $idganador = $input_idganador;
    }
    
    // Check input errors before inserting in database
	//$id = $idb1 = $idb2 = $peso = $idganador ="";
	//$id_err = $idb1_err = $idb2_err = $peso_err = $idganador_err ="";
    if(empty($id_err) && empty($idb1_err) && empty($idb2_err) && empty($peso_err) && empty($idganador_err)){
        $cliente = new nusoap_client("http://localhost/BOMV/ws_soap/ws_peleas_estatales.php");
		$datos = array('id' => $_POST["id"], 'idb1' => $_POST["idb1"], 'idb2' => $_POST["idb2"], 'peso' => $_POST["peso"], 'idganador' => $_POST["idganador"]);

		$resultado = $cliente->call('editarResultadoPeleaEstatal', $datos);
		
		$err = $cliente->getError();
		if($err){
			echo '<h2>Error del constructor</h2><pre>'.$err.'</pre>';
			echo '<h2>Request</h2><pre>'.htmlspecialchars($cliente->request, ENT_QUOTES).'</pre>';
			echo '<h2>Response</h2><pre>'.htmlspecialchars($cliente->response, ENT_QUOTES).'</pre>';
			echo '<h2>Debug</h2><pre>'.htmlspecialchars($cliente->getDebug(), ENT_QUOTES).'</pre>';
		}else{
			header("location: ../../views/resultados_peleas_estatales.php");
		}
    }
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        $cliente2 = new nusoap_client("http://localhost/BOMV/ws_soap/ws_peleas_estatales.php");

        $datos = array('id' => $id);

		$resultado = $cliente2->call('buscarResultadoPeleaEstatal', $datos);
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
            $idb1 = $obj->idb1;
            $idb2 = $obj->idb2;
            $peso = $obj->peso;
            $idganador = $obj->idganador;
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
    <title>Actualizar resultado de pelea estatal</title>
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
                        <h2>Actualizar el resultado de la pelea estatal</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    	<div class="form-group <?php echo (!empty($idb1_err)) ? 'has-error' : ''; ?>">
                            <label>Id b1</label>
                            <input type="text" name="idb1" class="form-control" value="<?php echo $idb1; ?>">
                            <span class="help-block"><?php echo $idb1_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($idb2_err)) ? 'has-error' : ''; ?>">
                            <label>Id b2</label>
                            <input type="text" name="idb2" class="form-control" value="<?php echo $idb2; ?>" placeholder="">
                            <span class="help-block"><?php echo $idb2_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($peso_err)) ? 'has-error' : ''; ?>">
                            <label>Peso</label>
                            <input type="text" name="peso" class="form-control" value="<?php echo $peso; ?>">
                            <span class="help-block"><?php echo $peso_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($idganador_err)) ? 'has-error' : ''; ?>">
                            <label>Id del ganador</label>
                            <input type="text" name="idganador" class="form-control" value="<?php echo $idganador; ?>">
                            <span class="help-block"><?php echo $idganador_err;?></span>
                        </div>

                        
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Guardar Pelea Municipal">
                        <a href="../../views/resultados_peleas_estatales.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>