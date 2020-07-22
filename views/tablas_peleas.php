<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tablas de peleas municipales</title>
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
        #div1 
        {
          overflow:scroll;
          height:80%;
          width:100%;
        }
    </style>

    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
<nav class="navbar sticky-top navbar-expand-lg navbar-light navbar-fixed-top" style="background-image: linear-gradient(to right, white, cyan);">
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
        <a class="nav-link" href="jueces.php">Jueces</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Tablas peleas municipales</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tablas_peleas_estatales.php">Tablas peleas estatales</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="peleas_municipales.php">Peleas municipales</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="peleas_estatales.php">Peleas estatales</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="posiciones_generales.php">Posiciones generales municipales</a>
      </li>
    </ul>
  </div>
</nav>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left" style="color:white;">Tablas de peleas municipales</h2>
                        <a href="tablas_peleas_agregar.php" class="btn btn-success pull-right">Agregar nueva tabla de pelea</a>
                    </div>
                    <?php
                      require_once('../ws_soap/lib/nusoap.php');
                      $cliente = new nusoap_client("http://localhost/BOMV/ws_soap/ws_gimnasio.php");
                      $datos = array();
                  
                      $resultado = $cliente->call('mostrarTablasPeleas', $datos);
                      
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