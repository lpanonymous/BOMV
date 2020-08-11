<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BOMV Posiciones generales estatales</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../vendors/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../vendors/css/grid.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../../resources/css/estilo-usuarios-noticias.css">
    <link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <style type="text/css">
        html, body
        {
            background-image: url('../../resources/banderaMexico.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;   
        }
        .opacity{
            /*opacity:0.8; Opacidad 60% */
        }
        #div1{
			/*overflow:scroll;*/
			/*height:100%;*/
			width:100%;
        }
		tr td{
			background: #2C3E50 !important;
		}
		/*Estilos de datatable*/
		label{
			color: aliceblue !important;
		}
		#myTable_info{
			color: #7F8C8D !important;
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
		td:nth-of-type(1):before { content: "Id"; }
		td:nth-of-type(2):before { content: "Alias boxeador:"; }
		td:nth-of-type(3):before { content: "Gimnasio:"; }
		td:nth-of-type(4):before { content: "Categoría:"; }
		td:nth-of-type(5):before { content: "División:"; }
		td:nth-of-type(6):before { content: "Peleas ganadas:"; }
		td:nth-of-type(7):before { content: "Peleas perdidas:";}
		td:nth-of-type(8):before { content: "Empates:"; }
	}
    </style>

    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
  <header>
      <h1><strong>B</strong>oxeo <strong>O</strong>límpico <strong>M</strong>exicano en <strong>V</strong>ívo</h1>
  </header>
  <nav class="navbar navbar-expand-lg navbar navbar-custom">
  <a class="navbar-brand" href="noticias.php">BOMV</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon">
      <i class="fa fa-navicon" style="color:#fff; font-size:28px;"></i>
    </span>
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
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Posiciones generales
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="posiciones_generales_municipales.php">Peleas municipales</a>
          <a class="dropdown-item active" href="posiciones_generales_estatales.php">Peleas estatales</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="gimnasios.php">Gimnasios</a>
      </li>
    </ul>
  </div>
</nav>

<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left" style="color:white;">Posiciones de peleas estatales</h2>
                    </div>
                    <?php
                      $res = file_get_contents("http://localhost/BOMV/controllers/ws_rest/posiciones_generales_estatales_rest.php");
                      $array = json_decode($res);
                      echo "<div class='opacity table-responsive' id='div1'><table table-responsive{-sm|-md|-lg|-xl} class='table table-bordered table-striped table-dark' id='myTable'><thead><tr><th>Id</th><th>Alias boxeador</th><th>Gimnasio</th><th>Categoría</th><th>División</th><th>Peleas ganadas</th><th>Peleas perdidas</th><th>Empates</th></tr></thead><tbody>";
                      foreach($array as $obj)
                      {
                        $id = $obj->id;
                        $alias_boxeador = $obj->alias_boxeador;
                        $gimnasio = $obj->gimnasio;
                        $categoria = $obj->categoria;
                        $division = $obj->division;
                        $peleas_ganadas = $obj->peleas_ganadas;
                        $peleas_perdidas = $obj->peleas_perdidas;
                        $empates = $obj->empates;
                        echo "<tr>";
                        echo "<td>$id</td>";
                        echo "<td>$alias_boxeador</td>";
                        echo "<td>$gimnasio</td>";
                        echo "<td>$categoria</td>";
                        echo "<td>$division</td>";
                        echo "<td>$peleas_ganadas</td>";
                        echo "<td>$peleas_perdidas</td>";
                        echo "<td>$empates</td>";
                        echo "</tr>";
                      }
                      echo "</tbody></table></div>";
                    ?>
                </div>
                </div>
            </div>        
        </div>
</body>
<script>
        $(document).ready(function() {
			$('#myTable').DataTable({
				 "language":	{
					"sProcessing":     "Procesando...",
					"sLengthMenu":     "Mostrar _MENU_ registros",
					"sZeroRecords":    "No se encontraron resultados",
					"sEmptyTable":     "Ningún dato disponible en esta tabla",
					"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
					"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
					"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
					"sInfoPostFix":    "",
					"sSearch":         "Buscar:",
					"sUrl":            "",
					"sInfoThousands":  ",",
					"sLoadingRecords": "Cargando...",
					"oPaginate": {
						"sFirst":    "Primero",
						"sLast":     "Último",
						"sNext":     "Siguiente",
						"sPrevious": "Anterior"
					}
          
				}
				} );
			} );
</script>
</html>

