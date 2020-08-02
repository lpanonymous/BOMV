<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BOMV Boxeadores</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../vendors/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../vendors/css/grid.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../../resources/css/estilo-usuarios-boxeadores.css">
</head>
<body>
  <header>
      <h1><strong>B</strong>oxeo <strong>O</strong>límpico <strong>M</strong>exicano en <strong>V</strong>ívo</h1>
  </header>
  
  <nav class="navbar navbar-expand-lg navbar navbar-custom">
  <a class="navbar-brand" href="noticias.php">BOMV</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="noticias.php">Noticias <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="boxeadores.php">Boxeadores</a>
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
      <li class="nav-item">
        <a class="nav-link" href="gimnasios.php">Gimnasios</a>
      </li>
    </ul>
  </div>
</nav>
<section>

<?php
  $res = file_get_contents("http://localhost/BOMV/controllers/ws_rest/boxeadores_rest.php");
  $array = json_decode($res);
  echo "<div class='row grupo-boxeadores'>";
  $cont = 0;
  foreach($array as $obj){
    $cont = $cont+1;
    $id = $obj->id_boxeador;
    $nombre = $obj->nombre_boxeador;
    $alias = $obj->alias;
    $division = $obj->division;
    $foto = $obj->foto;
    if($cont<=3){
      echo "<div class='flip-card col span-1-of-3'>
      <div class='flip-card-inner'>
              <div class='flip-card-front'>
                <img src='{$foto}' alt='Boxeador' class='foto-boxeador'>
              </div>
              <div class='flip-card-back'>
                <h1>{$division}</h1>
                <div class='card-texto'>
                  <p>{$nombre}</p>
                  <p>&quot;<i>{$alias}<i>&quot;</p>
                </div>
                <input type='text' value='{$id}' name='id' hidden/>
                <input type='submit' class='btn-boxeador' value='VER RECORD'/>
              </div>
              </div>
        </div>";
    }else{
      $cont = 1;
      echo "</div>";
      echo "<div class='row grupo-boxeadores'>";
      echo "<div class='flip-card col span-1-of-3'>
      <div class='flip-card-inner'>
              <div class='flip-card-front'>
                <img src='{$foto}' alt='Boxeador' class='foto-boxeador'>
              </div>
              <div class='flip-card-back'>
                <h1>{$division}</h1>
                <div class='card-texto'>
                  <p>{$nombre}</p>
                  <p>&quot;<i>{$alias}<i>&quot;</p>
                </div>
                <input type='text' value='{$id}' name='id' hidden/>
                <input type='submit' class='btn-boxeador' value='VER RECORD'/>
              </div>
            </div>
        </div>";
                }
              }
              echo "</div>";
            ?>
</section>
</body>
</html>