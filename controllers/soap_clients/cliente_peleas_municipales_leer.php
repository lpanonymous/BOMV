<?php
require_once('lib/nusoap.php');
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"])))
{
    $id =  trim($_GET["id"]);
    $cliente = new nusoap_client("http://localhost/BOMV/ws_soap/ws_peleas_municipales.php");
	$datos = array('id' => $id);

	$resultado = $cliente->call('buscarPeleaMunicipal', $datos);
	$array = unserialize($resultado);
    //print_r($array);
    $json = json_encode($array);
    $obj = json_decode($json);
	
	$err = $cliente->getError();
	if($err){
		echo '<h2>Error del constructor</h2><pre>'.$err.'</pre>';
		echo '<h2>Request</h2><pre>'.htmlspecialchars($cliente->request, ENT_QUOTES).'</pre>';
		echo '<h2>Response</h2><pre>'.htmlspecialchars($cliente->response, ENT_QUOTES).'</pre>';
		echo '<h2>Debug</h2><pre>'.htmlspecialchars($cliente->getDebug(), ENT_QUOTES).'</pre>';
	}else{
        $id = $obj->id;
		$categoria = $obj->categoria;
		$division = $obj->division;
        $id_juez1 = $obj->id_juez1;
        $id_juez2 = $obj->id_juez2;
        $id_juez3 = $obj->id_juez3;
        $id_juez4 = $obj->id_juez4;
        $id_boxeador1 = $obj->id_boxeador1;
        $id_boxeador2 = $obj->id_boxeador2;
		$fecha = $obj->fecha;
        $hora = $obj->hora;
        $ganador = $obj->ganador;
	}
} 
else
{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ver pelea</title>
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
                        <h1>Ver Pelea Municipal</h1>
                    </div>
                    <!--id, categoria, id_juez1, id_juez2, id_juez3, id_juez4, id_boxeador1, id_boxeador2, fecha, hora-->
                    <div class="form-group">
                        <label>Id Pelea Municipal</label>
                        <p class="form-control-static"><?php echo $id; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Categoria</label>
                        <p class="form-control-static"><?php echo $categoria; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Division</label>
                        <p class="form-control-static"><?php echo $division; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Id juez1</label>
                        <p class="form-control-static"><?php echo $id_juez1; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Id juez2</label>
                        <p class="form-control-static"><?php echo $id_juez2; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Id juez3</label>
                        <p class="form-control-static"><?php echo $id_juez3; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Id juez4</label>
                        <p class="form-control-static"><?php echo $id_juez4; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Id boxeador1</label>
                        <p class="form-control-static"><?php echo $id_boxeador1; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Id boxeador2</label>
                        <p class="form-control-static"><?php echo $id_boxeador2; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Fecha</label>
                        <p class="form-control-static"><?php echo $fecha; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Hora</label>
                        <p class="form-control-static"><?php echo $hora; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Ganador</label>
                        <p class="form-control-static"><?php echo $ganador; ?></p>
                    </div>
                    <p><a href="../../views/peleas_municipales.php" class="btn btn-primary">Regresar</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
