<?php
require_once('../../controllers/ws_soap/lib/nusoap.php');
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"])))
{
    $id =  trim($_GET["id"]);
    $cliente = new nusoap_client("http://localhost/BOMV/controllers/ws_soap/ws_tablas_peleas_estatales.php");
	$datos = array('id' => $id);

	$resultado = $cliente->call('buscarTablaPeleaEstatal', $datos);
	$array = unserialize($resultado);
    //print_r($array);
    $json = json_encode($array);
    $obj = json_decode($json);
	
	$err = $cliente->getError();
	if($err){
		echo '<h2>Error del constructor</h2><pre>'.$err.'</pre>';
		echo '<h2>Request</h2><pre>'.htmlspecialchars($cliente->request, ENT_QUOTES).'</pre>';
		echo '<h2>Response</h2><pre>'.htmlspecialchars($cliente->response, ENT_QUOTES).'</pre>';
		echo '<h2>Debug</h2><pre>'.htmlspecialchars($cliente->getDebug(), ENT_QUOTES).'</pre>';
	}else{
        $id = $obj->id;
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
} 
else
{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: ../../controllers/tools/error.php");
    exit();
}
?>
<html>
<head>
    <base target="_parent">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.0/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap">
    <link rel="stylesheet" href="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.1/css/mdb.min.css">
    <link rel="stylesheet" href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/css/compiled-addons-4.19.1.min.css">
    <link rel="stylesheet" type="text/css" href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/css/mdb-plugins-gathered.min.css">
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
    </style>
    <style type="text/css">/* Chart.js */
        @-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}
    </style>
</head>

<body aria-busy="true"><!-- Editable table -->
<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Ver tabla de pelea <span class="table-add float-right mb-3 mr-2"></span></h3>
  <div class="card-body">
    <div id="table" class="table-editable">
      <div id="div1">
      <table class="table table-bordered table-responsive{-sm|-md|-lg|-xl} table-striped text-center">
        <thead>
          <tr>
            <th class="text-center">Id</th>
            <th class="text-center">Id juez</th>
            <th class="text-center">Id pelea</th>
            <th class="text-center">Id boxeador</th>
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
          </tr>
        </thead>
        <tbody>
          <tr>
          <form action="" method="post">
            <td class="pt-3-half"><input type="number" name="id" value="<?php echo $id; ?>" disabled></td>
            <td class="pt-3-half"><input type="text" name="id_juez" value="<?php echo $id_juez; ?>" disabled></td>
            <td class="pt-3-half"><input type="number" name="id_pelea" value="<?php echo $id_pelea; ?>" disabled></td>
            <td class="pt-3-half"><input type="text" name="id_boxeador" value="<?php echo $id_boxeador; ?>" disabled></td>
            <td class="pt-3-half"><input type="number" name="round1" value="<?php echo $round1; ?>" disabled></td>
            <td class="pt-3-half"><input type="number" name="round2" value="<?php echo $round2; ?>" disabled></td>
            <td class="pt-3-half"><input type="number" name="round3" value="<?php echo $round3; ?>" disabled></td>
            <td class="pt-3-half"><input type="number" name="round4" value="<?php echo $round4; ?>" disabled></td>
            <td class="pt-3-half"><input type="number" name="round5" value="<?php echo $round5; ?>" disabled></td>
            <td class="pt-3-half"><input type="number" name="round6" value="<?php echo $round6; ?>" disabled></td>
            <td class="pt-3-half"><input type="number" name="round7" value="<?php echo $round7; ?>" disabled></td>
            <td class="pt-3-half"><input type="number" name="round8" value="<?php echo $round8; ?>" disabled></td>
            <td class="pt-3-half"><input type="number" name="round9" value="<?php echo $round9; ?>" disabled></td>
            <td class="pt-3-half"><input type="number" name="round10" value="<?php echo $round10; ?>" disabled></td>
            <td class="pt-3-half"><input type="number" name="round11" value="<?php echo $round11; ?>" disabled></td>
            <td class="pt-3-half"><input type="number" name="round12" value="<?php echo $round12; ?>" disabled></td>
            <td class="pt-3-half"><input type="number" name="total_puntos" value="<?php echo $total_puntos; ?>" disabled></td>
            <td class="pt-3-half"><input type="number" name="num_jabs" value="<?php echo $num_jabs; ?>" disabled></td>
            <td class="pt-3-half"><input type="number" name="num_power" value="<?php echo $num_power; ?>" disabled></td>
            <td class="pt-3-half"><input type="number" name="total_golpes" value="<?php echo $total_golpes; ?>" disabled></td>
            <td class="pt-3-half"><input type="number" name="ganador" value="<?php echo $ganador; ?>" disabled></td>
          </form>
          </tr>
        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>
<!-- Editable table -->
<script type="text/javascript" src="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.1/js/jquery.min.js"></script>
<script type="text/javascript" src="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.1/js/popper.min.js"></script>
<script type="text/javascript" src="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.1/js/mdb.min.js"></script>
<script type="text/javascript" src="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/js/bundles/4.19.1/compiled-addons.min.js"></script>
<script type="text/javascript" src="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/js/plugins/mdb-plugins-gathered.min.js"></script>
<script type="text/javascript">
        const $tableID = $('#table');
        const $BTN = $('#export-btn');
        const $EXPORT = $('#export');

        const newTr = `
        <tr class="hide">
        <td class="pt-3-half" contenteditable="true">Example</td>
        <td class="pt-3-half" contenteditable="true">Example</td>
        <td class="pt-3-half" contenteditable="true">Example</td>
        <td class="pt-3-half" contenteditable="true">Example</td>
        <td class="pt-3-half" contenteditable="true">Example</td>
        <td class="pt-3-half" contenteditable="true">Example</td>
        <td class="pt-3-half" contenteditable="true">Example</td>
        <td class="pt-3-half" contenteditable="true">Example</td>
        <td class="pt-3-half" contenteditable="true">Example</td>
        <td class="pt-3-half" contenteditable="true">Example</td>
        <td class="pt-3-half" contenteditable="true">Example</td>
        <td class="pt-3-half" contenteditable="true">Example</td>
        <td class="pt-3-half" contenteditable="true">Example</td>
        <td class="pt-3-half" contenteditable="true">Example</td>
        <td class="pt-3-half" contenteditable="true">Example</td>
        <td class="pt-3-half" contenteditable="true">Example</td>
        <td class="pt-3-half" contenteditable="true">Example</td>
        <td class="pt-3-half" contenteditable="true">Example</td>
        <td class="pt-3-half" contenteditable="true">Example</td>
        <td class="pt-3-half" contenteditable="true">Example</td>
        <td class="pt-3-half" contenteditable="true">Example</td>
        <td class="pt-3-half">
            <span class="table-up"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-up" aria-hidden="true"></i></a></span>
            <span class="table-down"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-down" aria-hidden="true"></i></a></span>
        </td>
        <td>
            <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0 waves-effect waves-light">Remove</button></span>
        </td>
        </tr>`;

        $('.table-add').on('click', 'i', () => {

        const $clone = $tableID.find('tbody tr').last().clone(true).removeClass('hide table-line');

        if ($tableID.find('tbody tr').length === 0) {

            $('tbody').append(newTr);
        }

        $tableID.find('table').append($clone);
        });

        $tableID.on('click', '.table-remove', function () {

        $(this).parents('tr').detach();
        });

        $tableID.on('click', '.table-up', function () {

        const $row = $(this).parents('tr');

        if ($row.index() === 0) {
            return;
        }

        $row.prev().before($row.get(0));
        });

        $tableID.on('click', '.table-down', function () {

        const $row = $(this).parents('tr');
        $row.next().after($row.get(0));
        });

        // A few jQuery helpers for exporting only
        jQuery.fn.pop = [].pop;
        jQuery.fn.shift = [].shift;

        $BTN.on('click', () => {

        const $rows = $tableID.find('tr:not(:hidden)');
        const headers = [];
        const data = [];

        // Get the headers (add special header logic here)
        $($rows.shift()).find('th:not(:empty)').each(function () {

            headers.push($(this).text().toLowerCase());
        });

        // Turn all existing rows into a loopable array
        $rows.each(function () {
            const $td = $(this).find('td');
            const h = {};

            // Use the headers from earlier to name our hash keys
            headers.forEach((header, i) => {

            h[header] = $td.eq(i).text();
            });

            data.push(h);
        });

        // Output the result
        $EXPORT.text(JSON.stringify(data));
        });
</script>
            <div class="hiddendiv common">
        </div>
    </body>
 </html>