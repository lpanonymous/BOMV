<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Boxeadores</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    <link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    
    <style type="text/css">
        body{
            background-image: url('../../resources/ali.jpg');
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
          height:70%;
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
		td:nth-of-type(2):before { content: "Foto:"; }
		td:nth-of-type(3):before { content: "Gimnasio:"; }
		td:nth-of-type(4):before { content: "Alias:"; }
		td:nth-of-type(5):before { content: "Nombre:"; }
		td:nth-of-type(6):before { content: "#Total Peleas:"; }
		td:nth-of-type(7):before { content: "Peleas Ganadas:"; }
		td:nth-of-type(8):before { content: "Pelas por K.O.:"; }
		td:nth-of-type(9):before { content: "Peleas Perdidas:"; }
		td:nth-of-type(10):before { content: "Perdidas por K.O.:"; }
		td:nth-of-type(11):before { content: "Empates:"; }
		td:nth-of-type(12):before { content: "Categoria:"; }
		td:nth-of-type(13):before { content: "División:"; }
		td:nth-of-type(14):before { content: "Peso:"; }
		td:nth-of-type(15):before { content: "Altura:"; }
		td:nth-of-type(16):before { content: "Estado:"; }
		td:nth-of-type(17):before { content: "Ciudad:"; }
		td:nth-of-type(18):before { content: "Municipio:"; }
		td:nth-of-type(19):before { content: "Funciones:"; }

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
      <li class="nav-item active">
        <a class="nav-link" href="boxeadores.php">Boxeadores</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="jueces.php">Jueces</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="peleas_municipales" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Peleas municipales
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="peleas_municipales.php">Peleas municipales</a>
          <a class="dropdown-item" href="tablas_peleas_municipales.php">Tablas de peleas municipales</a>
          <a class="dropdown-item" href="posiciones_generales.php">Posiciones de peleas municipales</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="peleas_estatales" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Peleas estatales
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="peleas_estatales.php">Peleas estatales</a>
          <a class="dropdown-item" href="tablas_peleas_estatales.php">Tablas de peleas estatales</a>
          <a class="dropdown-item" href="posiciones_estatales.php">Posiciones de peleas estatales</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left" style="color:white;">Boxeadores</h2>
                        <a href="../../controllers/soap_clients/cliente_boxeadores_agregar.php" style="background-color: #5499C7;" class="btn btn-info pull-right">Agregar nuevo boxeador</a>
                    </div>
                    <?php
                        require_once('../../controllers/ws_soap/lib/nusoap.php');
                        $cliente = new nusoap_client("http://localhost/BOMV/controllers/ws_soap/ws_boxeadores.php");
                        $datos = array();
                    
                        $resultado = $cliente->call('mostrarBoxeadores', $datos);
                        
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