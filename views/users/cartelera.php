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
    <link rel="stylesheet" type="text/css" href="../../resources/css/estilo-usuarios-cartelera.css">

    <link rel="apple-touch-icon" sizes="180x180" href="../../resources/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../resources/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../resources/favicons/favicon-16x16.png">
    <link rel="manifest" href="../../resources/favicons/site.webmanifest">
    <link rel="shortcut icon" href="../../resources/favicons/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="../../resources/favicons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
  <header>
      <h1><strong>B</strong>oxeo <strong>O</strong>límpico <strong>M</strong>exicano en <strong>V</strong>ívo</h1>
  </header>
<nav class="clearfix">
  <ul class="main-nav">
    <li><a class="nav-link" href="http://localhost/BOMV/views/users/noticias.php">Noticias<span class="sr-only">(current)</span></a></li>
    <li><a class="nav-link" href="http://localhost/BOMV/views/users/cartelera.php">Cartelera municipal</a></li>
    <li><a class="nav-link" href="http://localhost/BOMV/views/users/cartelera.php">Cartelera estatal</a></li>
    <li><a class="nav-link" href="http://localhost/BOMV/views/users/boxeadores.php">Boxeadores</a></li>
    <li><a class="nav-link" href="http://localhost/BOMV/views/users/gimnasios.php">Gimnasios</a></li>
    <li><a class="nav-link" href="">Resultados</a></li>
  </ul>
</nav>

<?php
              $res = file_get_contents("http://localhost/BOMV/controllers/ws_rest/cartelera_municipal_rest.php");
              $array = json_decode($res);
              echo "<div class='card-group'>";
              $cont = 0;
              foreach($array as $obj)
              {
                $cont = $cont+1;
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
                $foto_pelea = $obj->foto_pelea;
                if($cont<=3)
                {
                  echo "<div class='card'>
                  <img class='card-img-top' src='$foto_pelea' alt='Card image cap'>
                  <div class='card-body'>
                    <h5 class='card-title'>$id_boxeador1 VS $id_boxeador2</h5>
                    <p class='card-text'>Categoria: $categoria</p>
                    <p class='card-text'>División: $division</p>
                    <p class='card-text'>Fecha: $fecha</p>
                    <p class='card-text'>Hora: $hora</p>
                  </div>
                </div>";
                }
                else
                {
                  $cont = 0;
                  echo "</div>";
                  echo "<div class='card-group'>";
                  echo "<div class='card'>
                  <img class='card-img-top' src='$foto_pelea' alt='Card image cap'>
                  <div class='card-body'>
                    <h5 class='card-title'>$id_boxeador1 VS $id_boxeador2</h5>
                    <p class='card-text'>Categoria: $categoria</p>
                    <p class='card-text'>División: $division</p>
                    <p class='card-text'>Fecha: $fecha</p>
                    <p class='card-text'>Hora: $hora</p>
                  </div>
                </div>";
                }
              }
              echo "</div>";
            ?>

</body>
</html>

