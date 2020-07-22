<?php
require_once('../ws_soap/lib/nusoap.php');

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    $id = $_POST["id"];
    $id_juez = $_POST["id_juez"];
    $id_pelea = $_POST["id_pelea"];;
    $id_boxeador = $_POST["id_boxeador"]; 
    $round1 = $_POST["round1"];
    $round2 = $_POST["round2"];
    $round3 = $_POST["round3"];
    $round4 = $_POST["round4"];
    $round5 = $_POST["round5"];
    $round6 = $_POST["round6"];
    $round7 = $_POST["round7"];
    $round8 = $_POST["round8"];
    $round9 = $_POST["round9"];
    $round10 = $_POST["round10"];
    $round11 = $_POST["round11"];
    $round12 = $_POST["round12"];
    $total_puntos = $_POST["total_puntos"];
    $num_jabs = $_POST["num_jabs"];
    $num_power = $_POST["num_power"];
    $total_golpes = $_POST["total_golpes"];
    $ganador = $_POST["ganador"];
    
    // Check input errors before inserting in database
    if(!empty($id) && !empty($id_juez) && !empty($id_pelea) && !empty($id_boxeador) && !empty($round1) && !empty($round2) && !empty($round3) && !empty($round4) && !empty($round5) && !empty($round6) && !empty($round7) && !empty($round8) && !empty($round9) && !empty($round10) && !empty($round11) && !empty($round12) && !empty($total_puntos) && !empty($num_jabs) && !empty($num_power) && !empty($total_golpes)){
        $cliente = new nusoap_client("http://localhost/BOMV/ws_soap/ws_gimnasio.php");

    $datos = array('id' => $_POST["id"], 
                   'id_juez' => $_POST["id_juez"],
                   'id_pelea' => $_POST["id_pelea"],
                   'id_boxeador' => $_POST["id_boxeador"],
                   'round1' => $_POST["round1"],
                   'round2' => $_POST["round2"],
                   'round3' => $_POST["round3"],
                   'round4' => $_POST["round4"],
                   'round5' => $_POST["round5"],
                   'round6' => $_POST["round6"],
                   'round7' => $_POST["round7"],
                   'round8' => $_POST["round8"],
                   'round9' => $_POST["round9"],
                   'round10' => $_POST["round10"],
                   'round11' => $_POST["round11"],
                   'round12' => $_POST["round12"],
                   'total_puntos' => $_POST["total_puntos"],
                   'num_jabs' => $_POST["num_jabs"],
                   'num_power' => $_POST["num_power"],
                   'total_golpes' => $_POST["total_golpes"],
                   'ganador' => $_POST["ganador"]
                  );

		$resultado = $cliente->call('editarTablaPelea', $datos);
		
		$err = $cliente->getError();
		if($err){
			echo '<h2>Error del constructor</h2><pre>'.$err.'</pre>';
			echo '<h2>Request</h2><pre>'.htmlspecialchars($cliente->request, ENT_QUOTES).'</pre>';
			echo '<h2>Response</h2><pre>'.htmlspecialchars($cliente->response, ENT_QUOTES).'</pre>';
			echo '<h2>Debug</h2><pre>'.htmlspecialchars($cliente->getDebug(), ENT_QUOTES).'</pre>';
		}else{
			header("location: tablas_peleas.php");
		}
    }
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        $cliente2 = new nusoap_client("http://localhost/BOMV/ws_soap/ws_gimnasio.php");

        $datos = array('id' => $id);

    $resultado = $cliente2->call('buscarTablaPelea', $datos);
    $array = unserialize($resultado);
    //print_r($array);
    $json = json_encode($array);
    $obj = json_decode($json);
		
		$err = $cliente2->getError();
		if($err){
			echo '<h2>Error del constructor</h2><pre>'.$err.'</pre>';
			echo '<h2>Request</h2><pre>'.htmlspecialchars($cliente2->request, ENT_QUOTES).'</pre>';
			echo '<h2>Response</h2><pre>'.htmlspecialchars($cliente2->response, ENT_QUOTES).'</pre>';
			echo '<h2>Debug</h2><pre>'.htmlspecialchars($cliente2->getDebug(), ENT_QUOTES).'</pre>';
        }
        else
        {
          $id_juez = $obj->id_juez;
          $id_pelea = $obj->id_pelea;
          $id_boxeador = $obj->id_boxeador;
          $round1 = $obj->round1;
          $round2 = $obj->round2;
          $round3 = $obj->round3;
          $round4 = $obj->round4;
          $round5 = $obj->round5;
          $round6 = $obj->round6;
          $round7 = $obj->round7;
          $round8 = $obj->round8;
          $round9 = $obj->round9;
          $round10 = $obj->round10;
          $round11 = $obj->round11;
          $round12 = $obj->round12;
          $total_puntos = $obj->total_puntos;
          $num_jabs = $obj->num_jabs;
          $num_power = $obj->num_power;
          $total_golpes = $obj->total_golpes;
          $ganador = $obj->ganador;
		    }
        
    }  else{    
        // URL doesn't contain valid id. Redirect to error page
        header("location: ../controllers/error.php");
        exit();
        exit();
    }
}
?>
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
        #search_juez
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
            <th class="text-center">Juez</th>
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
            <th class="text-center">Actualizar</th>
          </tr>
        </thead>
        <tbody>
          <tr>
          <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
              <td class="pt-3-half"><input type="text" id="search_juez" name="id_juez" value="<?php echo $id_juez; ?>"></td>
              <td class="pt-3-half"><input type="number" name="id_pelea" value="<?php echo $id_pelea; ?>"></td>
              <td class="pt-3-half"><input type="text" id="search_boxeador" name="id_boxeador" value="<?php echo $id_boxeador; ?>"></td>
              <td class="pt-3-half"><input type="number" name="round1" value="<?php echo $round1; ?>"></td>
              <td class="pt-3-half"><input type="number" name="round2" value="<?php echo $round2; ?>"></td>
              <td class="pt-3-half"><input type="number" name="round3" value="<?php echo $round3; ?>"></td>
              <td class="pt-3-half"><input type="number" name="round4" value="<?php echo $round4; ?>"></td>
              <td class="pt-3-half"><input type="number" name="round5" value="<?php echo $round5; ?>"></td>
              <td class="pt-3-half"><input type="number" name="round6" value="<?php echo $round6; ?>"></td>
              <td class="pt-3-half"><input type="number" name="round7" value="<?php echo $round7; ?>"></td>
              <td class="pt-3-half"><input type="number" name="round8" value="<?php echo $round8; ?>"></td>
              <td class="pt-3-half"><input type="number" name="round9" value="<?php echo $round9; ?>"></td>
              <td class="pt-3-half"><input type="number" name="round10" value="<?php echo $round10; ?>"></td>
              <td class="pt-3-half"><input type="number" name="round11" value="<?php echo $round11; ?>"></td>
              <td class="pt-3-half"><input type="number" name="round12" value="<?php echo $round12; ?>"></td>
              <td class="pt-3-half"><input type="number" name="total_puntos" value="<?php echo $total_puntos; ?>"></td>
              <td class="pt-3-half"><input type="number" name="num_jabs" value="<?php echo $num_jabs; ?>"></td>
              <td class="pt-3-half"><input type="number" name="num_power" value="<?php echo $num_power; ?>"></td>
              <td class="pt-3-half"><input type="number" name="total_golpes" value="<?php echo $total_golpes; ?>"></td>
              <td class="pt-3-half"><input type="number" name="ganador" value="<?php echo $ganador; ?>"></td>
            <td>
              <input type="hidden" name="id" value="<?php echo $id; ?>"/>
              <span><button type="submit" class="btn btn-success btn-rounded btn-sm my-0 waves-effect waves-light">Actualizar</button></span>
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

<script type="text/javascript">
		$(function() {
			$( "#search_juez" ).autocomplete({
			source: '../controllers/ajax-juez-search.php',
			});
		});
	</script>

</body>
</html>