<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BOMV</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        .carousel
        {
          background: black;
          width: 80%;
          left: 10%;
        }
        .carousel-item
        {
          text-align: center;
          min-height: 280px; /* Prevent carousel from being distorted if for some reason image doesn't load */
        }

        .carousel-inner img 
        {
            width: 80%;
            height: 65vh;
        }

        .carousel-inner
        {
            height: 85vh;
        }

        .carousel-caption {
          top: 100%;
          bottom: auto;
      }
      input
      {
        border:0;  
      }
    </style>
</head>
<body>
<nav class="navbar sticky-top navbar-expand-lg navbar-light navbar-fixed-top" style="background-image: linear-gradient(to right, green, white, red);">
  <a class="navbar-brand" href="#">BOMV</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Noticias<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">Cartelera</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">Boxeadores</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">En vivo</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">Gimnasios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">Resultados</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container-lg my-3">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for carousel items -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../resources/banderaMexico.jpg" alt="First Slide">
                <div class="carousel-caption">
                  <h5>Bienvenido a BOMV</h5>
                  <p>"Boxeo Olimpico Mexicano en Vivo"</p>
                </div>
            </div>

            <?php
              $res = file_get_contents("http://localhost/BOMV/ws_rest/post.php");
              $array = json_decode($res);
              foreach($array as $obj)
              {
                $id = $obj->id;
                $titulo = $obj->titulo;
                $fecha = $obj->fecha;
                $cuerpo = $obj->cuerpo;
                $foto = $obj->foto;
                echo "<div class='carousel-item' >
                        <img src='{$foto}'>
                          <div class='carousel-caption'>
                            <h5>{$titulo}</h5>
                          </div>
                      </div>";
              }
            ?>
        </div>
        <!-- Carousel controls -->
        <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
  </div>

    
        <?php
              $res = file_get_contents("http://localhost/BOMV/ws_rest/post.php");
              $array = json_decode($res);
              echo "<div class='card-group'>";
              $cont = 0;
              foreach($array as $obj)
              {
                $cont = $cont+1;
                $id = $obj->id;
                $titulo = $obj->titulo;
                $fecha = $obj->fecha;
                $cuerpo = $obj->cuerpo;
                $foto = $obj->foto;
                if($cont<=3)
                {
                  echo "<div class='card mb-3' style='max-width: 540px;'>
                  <div class='row no-gutters'>
                    <div class='col-md-4'>
                      <img src='{$foto}' class='card-img'>
                    </div>
                    <div class='col-md-8'>
                      <div class='card-body'>
                        <h5 class='card-title'>{$titulo}</h5>
                        <p class='card-text'><small class='text-muted'>{$fecha}</small></p>
                        <form action='noticia.php' method='Post'>
                          <input type='text' value='{$id}' name='id' hidden/>
                          <input type='text' value='{$titulo}' name='titulo' hidden/>
                          <input type='text' value='{$fecha}' name='fecha' hidden/>
                          <input type='text' value='{$cuerpo}' name='cuerpo' hidden/>
                          <input type='text' value='{$foto}' name='foto' hidden/>
      						        <input type='submit' class='btn btn-primary' value='Más información'/>
							  				</form>
                      </div>
                    </div>
                  </div>
                </div>";
                }
                else
                {
                  $cont = 0;
                  echo "</div>";
                  echo "<div class='card-group'>";
                  echo "<div class='card mb-3' style='max-width: 540px;'>
                  <div class='row no-gutters'>
                    <div class='col-md-4'>
                      <img src='{$foto}' class='card-img'>
                    </div>
                    <div class='col-md-8'>
                      <div class='card-body'>
                        <h5 class='card-title'>{$titulo}</h5>
                        <p class='card-text'><small class='text-muted'>{$fecha}</small></p>
                        <form action='noticia.php' method='Post'>
                          <input type='text' value='{$id}' name='id' hidden/>
                          <input type='text' value='{$titulo}' name='titulo' hidden/>
                          <input type='text' value='{$fecha}' name='fecha' hidden/>
                          <input type='text' value='{$cuerpo}' name='cuerpo' hidden/>
                          <input type='text' value='{$foto}' name='foto' hidden/>
      						        <input type='submit' class='btn btn-primary' value='Más información'/>
							  				</form>
                      </div>
                    </div>
                  </div>
                </div>";
                }
              }
              echo "</div>";
            ?>
</body>
</html>

