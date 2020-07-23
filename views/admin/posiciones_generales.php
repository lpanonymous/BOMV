<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Posiciones generales municipales</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style type="text/css">
        body{
            background-image: url('../../resources/ali.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
        .opacity{
            opacity:0.8; /* Opacidad 60% */
        }
        #div1{
			/*overflow:scroll;*/
			height:80%;
			width:100%;
        }
		@media
	  only screen 
    and (max-width: 800px), (min-device-width: 868px) 
    and (max-device-width: 1024px)  {

		/* Force table to not be like tables anymore */
		table, thead, tbody, th, td, tr {
			display: block;
		}

		/* Hide table headers (but not display: none;, for accessibility) */
		thead tr {
			position: absolute;
			top: -9999px;
			left: -9999px;
		}

    tr {
      margin: 0 0 2rem 0;
    }
      
    tr:nth-child(odd) {
      background: #ccc;
    }
    
		td {
			/* Behave  like a "row" */
			border: none;
			border-bottom: 1px solid #eee;
			position: relative;
			padding-left: 50%;
		}

		td:before {
			/* Now like a table header */
			position: absolute;
			/* Top/left values mimic padding */
			top: 0;
			left: 6px;
			width: 45%;
			padding-right: 100px;
			white-space: nowrap;
		}
		tr td:first-child {
           background: #5499C7;
           font-weight:bold;
           font-size:1.3em;
       }
		tbody td {
           display: block;
           text-align:center;
       }
       tbody td:before {
           content: attr(data-th);
           display: block;
           text-align:center;
       }
		/*
		Label the data
    You could also use a data-* attribute and content for this. That way "bloats" the HTML, this way means you need to keep HTML and CSS in sync. Lea Verou has a clever way to handle with text-shadow.
		*/
		td:nth-of-type(1):before { content: "Id"; }
		td:nth-of-type(2):before { content: "Foto:"; }
		td:nth-of-type(3):before { content: "Titulo:"; }
		td:nth-of-type(4):before { content: "Fecha:"; }
		td:nth-of-type(5):before { content: "Cuerpo:"; }
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
      <li class="nav-item">
        <a class="nav-link" href="tablas_peleas_municipales.php">Tablas peleas municipales</a>
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
      <li class="nav-item active">
        <a class="nav-link" href="">Posiciones generales municipales</a>
      </li>
    </ul>
  </div>
</nav>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left" style="color:white;">Posiciones generales municipales</h2>
                        <a href="../controllers/soap_clients/cliente_noticias_agregar.php" class="btn btn-success pull-right">Agregar nueva posición</a>
                    </div>
                    <form action="../ws_rest/posiciones_generales_rest.php" method="get">
                        <div class="form-row align-items-center">
                            <div class="col-auto my-1">
                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="categoria">
                                <option selected>Categoria...</option>
                                <option value="M">Masculina</option>
                                <option value="F">Femenina</option>
                            </select>
                            </div>

                            <div class="col-auto my-1">
                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="division">
                                <option selected>División...</option>
                                <option value="minimosca">minimosca o semimosca(48 kg)</option>
                                <option value="mosca">mosca(51 kg)</option>
                                <option value="gallo">gallo(54 kg)</option>
                                <option value="pluma">pluma(57 kg)</option>
                                <option value="ligero">ligero(60 kg)</option>
                                <option value="superligero">superligero o welter jr(64 kg)</option>
                                <option value="welter">welter(69 kg)</option>
                                <option value="mediano">mediano o medio(75 kg)</option>
                                <option value="mediopesado">mediopesado o semipesado(81 kg)</option>
                                <option value="pesado">pesado(91 kg)</option>
                                <option value="superpesado">superpesado(91 kg)</option>
                            </select>
                            </div>

                            <div class="col-auto my-1">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                    <?php
                      //rest
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>