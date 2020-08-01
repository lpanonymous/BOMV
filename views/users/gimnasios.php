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
<nav>
  <ul class="main-nav">
    <li><a class="nav-link" href="http://localhost/BOMV/views/users/noticias.php">Noticias<span class="sr-only">(current)</span></a></li>
    <li><a class="nav-link" href="http://localhost/BOMV/views/users/cartelera.php">Cartelera</a></li>
    <li><a class="nav-link" href="http://localhost/BOMV/views/users/boxeadores.php">Boxeadores</a></li>
    <li><a class="nav-link" href="http://localhost/BOMV/views/users/gimnasios.php">Gimnasios</a></li>
  </ul>
</nav>
<section>
    <div class="row texto">
        <p><strong>¿Te interesa entrenar en alguno de estos gimnasios?</strong><br>
            Da click en uno para ver más detalles.</p>
    </div>
<?php
  $res = file_get_contents("http://localhost/BOMV/controllers/ws_rest/post.php");
  $array = json_decode($res);
  echo "<ul class='lista-gimnasios clearfix'>";
  $cont = 0;
  foreach($array as $obj){
    $cont = $cont+1;
    $foto = $obj->foto;
    if($cont<=4){
      echo "<li>
                <figure class='gym-photo'>
                    <img src='{$foto}' alt='Foto gimnasio'>
                </figure>
            </li>";
    }else{
      $cont = 0;
      echo "</ul>";
      echo "<ul class='lista-gimnasios clearfix'>";
      echo "<li>
                <figure class='gym-photo'>
                    <img src='{$foto}' alt='Foto gimnasio'>
                </figure>
            </li>";
                }
              }
            ?>
</section>
</body>
</html>