<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Resultados de Peleas Municipales</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style type="text/css">
        body{
            background-image: url('../resources/ali.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
        .opacity
        {
            opacity:0.8; /* Opacidad 60% */
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light" style="background-image: linear-gradient(to right, white, cyan);">
  <a class="navbar-brand" href="#">BOMV</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="noticias.php">Noticias<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="gimnasios.php">Gimnasios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="boxeadores.php">Boxeadores</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Jueces</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Tablas de peleas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="peleas_municipales.php">Peleas municipales</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="resultados_peleas_municipales.php">Resultados de peleas municipales</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="peleas_estatales.php">Peleas estatales</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="resultados_peleas_estatales.php">Resultados de peleas estatales</a>
      </li>
    </ul>
  </div>
</nav>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left" style="color:white;">Resultados de Peleas Estatales</h2>
                        <a href="../controllers/soap_clients/cliente_resultados_peleas_estatales_agregar.php" class="btn btn-success pull-right">Agregar nuevo resultado de pelea estatal</a>
                    </div>
                    <?php
                        require_once('../ws_soap/lib/nusoap.php');
                        $cliente = new nusoap_client("http://localhost/BOMV/ws_soap/ws_peleas_estatales.php");
                        $datos = array();
                    
                        $resultado = $cliente->call('mostrarResultadoPeleaEstatal', $datos);
                        
                        $err = $cliente->getError();
                        if($err){
                            echo '<h2>Error del constructor</h2><pre>'.$err.'</pre>';
                            echo '<h2>Request</h2><pre>'.htmlspecialchars($cliente->request, ENT_QUOTES).'</pre>';
                            echo '<h2>Response</h2><pre>'.htmlspecialchars($cliente->response, ENT_QUOTES).'</pre>';
                            echo '<h2>Debug</h2><pre>'.htmlspecialchars($cliente->getDebug(), ENT_QUOTES).'</pre>';
                        }
                        else
                        {
                            echo $resultado;
                        }
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>