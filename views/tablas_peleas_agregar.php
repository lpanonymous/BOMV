<!doctype html>
<html lang="en">
<head>
    <!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 
<!-- jQuery UI -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
 
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .pt-3-half 
        {
            padding-top: 1.4rem;
        }

        #div1 
        {
          overflow:scroll;
          height:80%;
          width:100%;
        }
        input
        {
          width:50px;
          height: 50px;
          border: 0;
          text-align:center;
          background-color:transparent;
        }
        #search_boxeador
        {
          width:150px;
        }
    </style>
    <style type="text/css">/* Chart.js */
        @-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}
    </style>
</head>

<body aria-busy="true"><!-- Editable table -->
<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Agregar tablas de peleas <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span></h3>
  <div class="card-body">
    <div id="table" class="table-editable">
      <div id="div1">
      <table class="table table-bordered table-responsive{-sm|-md|-lg|-xl} table-striped text-center">
        <thead>
          <tr>
            <th class="text-center">Id</th>
            <th class="text-center">Id juez</th>
            <th class="text-center">Id pelea</th>
            <th class="text-center">Alias boxeador</th>
            <th class="text-center">Round 1</th>
            <th class="text-center">Round 2</th>
            <th class="text-center">Round 3</th>
            <th class="text-center">Round 4</th>
            <th class="text-center">Round 5</th>
            <th class="text-center">Round 6</th>
            <th class="text-center">Round 7</th>
            <th class="text-center">Round 8</th>
            <th class="text-center">Round 9</th>
            <th class="text-center">Round 10</th>
            <th class="text-center">Round 11</th>
            <th class="text-center">Round 12</th>
            <th class="text-center">Total puntos</th>
            <th class="text-center"># jabs</th>
            <th class="text-center"># power</th>
            <th class="text-center">Total golpes</th>
            <th class="text-center">Ganador?</th>
            <th class="text-center">Agregar</th>
          </tr>
        </thead>
        <tbody>
          <tr>
          <form action="../controllers/soap_clients/cliente_tablas_peleas_agregar.php" method="post">
            <td class="pt-3-half"><input type="number" name="id" placeholder="1"></td>
            <td class="pt-3-half"><input type="text" name="id_juez" placeholder="J1"></td>
            <td class="pt-3-half"><input type="number" name="id_pelea" placeholder="1"></td>
            <td class="pt-3-half"><input type="text" name="id_boxeador" id="search_boxeador"></td>  
            <td class="pt-3-half"><input type="number" name="round1" placeholder="10"></td>
            <td class="pt-3-half"><input type="number" name="round2" placeholder="10"></td>
            <td class="pt-3-half"><input type="number" name="round3"placeholder="10"></td>
            <td class="pt-3-half"><input type="number" name="round4" placeholder="9"></td>
            <td class="pt-3-half"><input type="number" name="round5" placeholder="10"></td>
            <td class="pt-3-half"><input type="number" name="round6" placeholder="9"></td>
            <td class="pt-3-half"><input type="number" name="round7" placeholder="10"></td>
            <td class="pt-3-half"><input type="number" name="round8" placeholder="9"></td>
            <td class="pt-3-half"><input type="number" name="round9" placeholder="10"></td>
            <td class="pt-3-half"><input type="number" name="round10" placeholder="9"></td>
            <td class="pt-3-half"><input type="number" name="round11" placeholder="10"></td>
            <td class="pt-3-half"><input type="number" name="round12" placeholder="9"></td>
            <td class="pt-3-half"><input type="number" name="total_puntos" placeholder="115"></td>
            <td class="pt-3-half"><input type="number" name="num_jabs" placeholder="150"></td>
            <td class="pt-3-half"><input type="number" name="num_power" placeholder="100"></td>
            <td class="pt-3-half"><input type="number" name="total_golpes" placeholder="250"></td>
            <td class="pt-3-half"><input type="number" name="ganador" placeholder="1"></td>
            <td>
              <span><button type="submit" class="btn btn-success btn-rounded btn-sm my-0 waves-effect waves-light">Agregar</button></span>
            </td>
          </form>
          </tr>
        </tbody>
      </table>
      </div>
    </div>
    
  </div>
</div>
<div class="hiddendiv common">
</div>
<script type="text/javascript">
  $(function() {
     $( "#search_boxeador" ).autocomplete({
       source: '../controllers/ajax-boxeador-search.php',
     });
  });
</script>
</body>
</html>