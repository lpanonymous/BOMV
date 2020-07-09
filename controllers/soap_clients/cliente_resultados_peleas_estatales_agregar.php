<?php
	require_once('lib/nusoap.php');

	// Define variables and initialize with empty values
	$id = $idb1 = $idb2 = $peso = $idganador ="";
	$id_err = $idb1_err = $idb2_err = $peso_err = $idganador_err ="";

	// Processing form data when form is submitted
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		// Validate id
		$input_id = trim($_POST["id"]);
		if(empty($input_id)){
			$id_err = "Please enter a id.";
		} 
		else{
			$id = $input_id;
		}
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
		if(empty($id_err) && empty($idb1_err) && empty($idb2_err) && empty($peso_err) && empty($idganador_err)){
			$cliente = new nusoap_client("http://localhost/BOMV/ws_soap/ws_peleas_estatales.php");

			$datos = array('id' => $_POST["id"], 'idb1' => $_POST["idb1"], 'idb2' => $_POST["idb2"], 'peso' => $_POST["peso"], 'idganador' => $_POST["idganador"]);

			$resultado = $cliente->call('agregarResultadoPeleaEstatal', $datos);
			
			$err = $cliente->getError();
			if($err){
				echo '<h2>Error del constructor</h2><pre>'.$err.'</pre>';
				echo '<h2>Request</h2><pre>'.htmlspecialchars($cliente->request, ENT_QUOTES).'</pre>';
				echo '<h2>Response</h2><pre>'.htmlspecialchars($cliente->response, ENT_QUOTES).'</pre>';
				echo '<h2>Debug</h2><pre>'.htmlspecialchars($cliente->getDebug(), ENT_QUOTES).'</pre>';
			}else{
				header("location: ../../views/resultados_peleas_estatales.php");
				//echo '<h2>Resultado</h2><pre>'; print_r($resultado); echo '</pre>';
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Crear Resultado de Pelea Estatal</title>
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
                        <h2>Crear Resultado de Pelea Estatal</h2>
                    </div>
                    <p>Porfavor ingresa los datos y luego da clic en agregar resultado de pelea estatal para almacenarlo en la base de datos.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($id)) ? 'has-error' : ''; ?>">
                            <label>Id</label>
                            <input type="text" name="id" class="form-control" value="<?php echo $id; ?>">
                            <span class="help-block"><?php echo $id_err;?></span>
                        </div>
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

                        <input type="submit" class="btn btn-primary" value="Agregar Resultado de Pelea Estatal">
                        <a href="../../views/resultados_peleas_estatales.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>