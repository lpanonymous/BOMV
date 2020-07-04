<?php
require_once('lib/nusoap.php');
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"])))
{
    $id =  trim($_GET["id"]);
    $cliente = new nusoap_client("http://localhost/BOMV/ws_soap/ws_gimnasio.php");
	$datos = array('id' => $id);

	$resultado = $cliente->call('buscarGimnasio', $datos);
	
	$err = $cliente->getError();
	if($err){
		echo '<h2>Error del constructor</h2><pre>'.$err.'</pre>';
		echo '<h2>Request</h2><pre>'.htmlspecialchars($cliente->request, ENT_QUOTES).'</pre>';
		echo '<h2>Response</h2><pre>'.htmlspecialchars($cliente->response, ENT_QUOTES).'</pre>';
		echo '<h2>Debug</h2><pre>'.htmlspecialchars($cliente->getDebug(), ENT_QUOTES).'</pre>';
	}else{
        $array = explode("<", $resultado);
        $id = $array[0];
		$nombre = $array[1];
        $ubicacion = $array[2];
        $telefono = $array[3];
        $facebook = $array[4];
        $email = $array[5];
        $descripcion = $array[6];
        $foto = $array[7];
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
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
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
                        <h1>Ver Gimnasio</h1>
                    </div>
                    <div class="form-group">
                        <label>Id Gimnasio</label>
                        <p class="form-control-static"><?php echo $id; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Nombre</label>
                        <p class="form-control-static"><?php echo $nombre; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Ubicacion</label>
                        <p class="form-control-static"><?php echo $ubicacion; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Telefono</label>
                        <p class="form-control-static"><?php echo $telefono; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Facebook</label>
                        <p class="form-control-static"><?php echo $facebook; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <p class="form-control-static"><?php echo $email; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Descripcion</label>
                        <p class="form-control-static"><?php echo $descripcion; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <p class="form-control-static"><?php echo $foto; ?></p>
                    </div>
                    <p><a href="../views/gimnasios.php" class="btn btn-primary">Regresar</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
