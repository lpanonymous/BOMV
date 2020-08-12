<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BOMV Cartelera</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../vendors/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../vendors/css/grid.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../../resources/css/estilo-usuarios-gimnasios.css">
</head>
<body>
  <header>
      <h1><strong>B</strong>oxeo <strong>O</strong>límpico <strong>M</strong>exicano en <strong>V</strong>ívo</h1>
  </header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="noticias.php">BOMV</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="noticias.php">Noticias <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Cartelera
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="cartelera.php">Peleas municipales</a>
          <a class="dropdown-item" href="cartelera_estatal.php">Peleas estatales</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Posiciones generales
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="posiciones_generales_municipales.php">Peleas municipales</a>
          <a class="dropdown-item" href="posiciones_generales_estatales.php">Peleas estatales</a>
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="gimnasios.php">Gimnasios</a>
      </li>
    </ul>
  </div>
  <a class="btn btn-outline-light btn-lg" href="../../login/cerrarSesion.php">
  	<i class="fa fa-sign-out" onclick="cerrarSesion()" aria-hidden="true"></i>
                    Cerrar Sesion
  </a>
</nav>
<div class="titulo">
  <h3><strong>¿Te interesa entrenar en alguno de estos gimnasios?</strong></h3>
</div>
<section>
    <?php
              /*$res = file_get_contents("http://localhost/BOMV/controllers/ws_rest/gimnasios_rest.php");
              $array = json_decode($res);
              echo "<div class='card-group'>";
              $cont = 0;
              foreach($array as $obj)
              {
                $cont = $cont+1;
                $id = $obj->id;
                $nombre = $obj->nombre;
                $ubicacion = $obj->ubicacion;
                $telefono = $obj->telefono;
                $facebook = $obj->facebook;
                $email = $obj->email;
                $descripcion = $obj->descripcion;
                $foto = $obj->foto;
                
                if($cont<=3)
                {
                  echo "<div class='card'>
                  <img class='card-img-top' src='$foto' alt='Card image cap' height='400px'>
                  <div class='card-body'>
                    <h5 class='card-title'>$nombre</h5>
                    <p class='card-text'>Telefono: $telefono</p>
                    <p class='card-text'>Facebook: $facebook</p>
                    <p class='card-text'>Email: $email</p>
                    <p class='card-text'>Descripción: $descripcion</p>
                    <p class='card-text'><a href='$ubicacion'>Clic para ver la ubicación...<a></p>
                    <form action='boxeadores.php' method='Post'>
                      <input type='text' value='$id' name='id' hidden/>
                      <input type='text' value='$nombre' name='nombre' hidden/>
					            <input type='submit' class='btn btn-primary' value='Ver boxeadores participantes'/>
					          </form>
                  </div>
                </div>";
                }
                else
                {
                  $cont = 0;
                  echo "</div>";
                  echo "<div class='card-group'>";
                  echo "<div class='card'>
                  <img class='card-img-top' src='$foto' alt='Card image cap' height='400px'>
                  <div class='card-body'>
                    <h5 class='card-title'>$nombre</h5>
                    <p class='card-text'>Telefono: $telefono</p>
                    <p class='card-text'>Facebook: $facebook</p>
                    <p class='card-text'>Email: $email</p>
                    <p class='card-text'>Descripción: $descripcion</p>
                    <p class='card-text'><a href='$ubicacion'>Clic para ver la ubicación...<a></p>
                    <form action='boxeadores.php' method='Post'>
                      <input type='text' value='$id' name='id' hidden/>
                      <input type='text' value='$nombre' name='nombre' hidden/>
					            <input type='submit' class='btn btn-primary' value='Ver boxeadores participantes'/>
					          </form>
                  </div>
                </div>";
                }
              }
              echo "</div>";*/

              require_once('../../controllers/ws_soap/lib/nusoap.php');
              $cliente = new nusoap_client("http://localhost/BOMV/controllers/ws_soap/ws_gimnasios.php");
              $datos = array();
              $resultado = $cliente->call('mostrarGimnasiosUsers', $datos);
              $err = $cliente->getError();
              if($err)
              {
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
</section>
</body>
</html>