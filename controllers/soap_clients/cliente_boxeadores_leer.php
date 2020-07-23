<?php
require_once('lib/nusoap.php');
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"])))
{
    $id =  trim($_GET["id"]);
    $cliente = new nusoap_client("http://localhost/BOMV/ws_soap/ws_boxeadores.php");
	$datos = array('id' => $id);

    $resultado = $cliente->call('buscarBoxeador', $datos);
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
    }
    else
    {
        
        $id_boxeador = $obj->id_boxeador;
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
    <title>View Record</title>
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
                        <h1>Ver Boxeador</h1>
                    </div>
                    <div class="form-group">
                        <label>Id</label>
                        <p class="form-control-static"><?php echo $id_boxeador; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Id gimnasio</label>
                        <p class="form-control-static"><?php echo $id_gimnasio; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Alias</label>
                        <p class="form-control-static"><?php echo $alias; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Nombre</label>
                        <p class="form-control-static"><?php echo $nombre_boxeador; ?></p>
                    </div>
                    <div class="form-group">
                        <label>#Total peleas</label>
                        <p class="form-control-static"><?php echo $total_peleas; ?></p>
                    </div>
                    <div class="form-group">
                        <label>#Peleas ganadas</label>
                        <p class="form-control-static"><?php echo $peleas_ganadas; ?></p>
                    </div>
                    <div class="form-group">
                        <label>#Peleas ganadas k.o</label>
                        <p class="form-control-static"><?php echo $peleas_ganadas_ko; ?></p>
                    </div>
                    <div class="form-group">
                        <label>#Peleas perdidas</label>
                        <p class="form-control-static"><?php echo $peleas_perdidas; ?></p>
                    </div>
                    <div class="form-group">
                        <label>#Peleas perdidas k.o</label>
                        <p class="form-control-static"><?php echo $peleas_perdidas_ko; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Empates</label>
                        <p class="form-control-static"><?php echo $empates; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Categoria</label>
                        <p class="form-control-static"><?php echo $categoria; ?></p>
                    </div>
                    <div class="form-group">
                        <label>División</label>
                        <p class="form-control-static"><?php echo $division; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Peso</label>
                        <p class="form-control-static"><?php echo $peso; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Altura</label>
                        <p class="form-control-static"><?php echo $altura; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Estado</label>
                        <p class="form-control-static"><?php echo $estado; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Ciudad</label>
                        <p class="form-control-static"><?php echo $ciudad; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Municipio</label>
                        <p class="form-control-static"><?php echo $municipio; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <p class="form-control-static"><?php echo $foto; ?></p>
                    </div>
                    <p><a href="../../views/admin/boxeadores.php" class="btn btn-primary">Regresar</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
