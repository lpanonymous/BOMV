<?php
require_once('lib/nusoap.php');
// Define variables and initialize with empty values
$id = $categoria = $division = $id_juez1 = $id_juez2 = $id_juez3 = $id_juez4 = $id_boxeador1 = $id_boxeador2 = $fecha = $hora = $ganador = "";
$id_err = $categoria_err = $division_err = $id_juez1_err = $id_juez2_err = $id_juez3_err = $id_juez4_err = $id_boxeador1_err = $id_boxeador2_err = $fecha_err = $hora_err = $ganador_err = "";
 
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate categoria
    $input_categoria = trim($_POST["categoria"]);
    if(empty($input_categoria)){
        $categoria_err = "Ingresa la categoria de la pelea.";
    } 
    else{
        $categoria = $input_categoria;
    }

    // Validate division
    $input_division = trim($_POST["division"]);
    if(empty($input_division)){
        $division_err = "Ingresa la division de la pelea.";
    } 
    else{
        $division = $input_division;
    }

    // Validate id_juez1   
    $input_id_juez1 = trim($_POST["id_juez1"]);
    if(empty($input_id_juez1)){
        $id_juez1_err = "Ingresa el id del juez 1.";
    }else{
        $id_juez1 = $input_id_juez1;
    }
	
	// Validate id_juez2   
    $input_id_juez2 = trim($_POST["id_juez2"]);
    if(empty($input_id_juez2)){
        $id_juez2_err = "Ingresa el id del juez 2.";
    }else{
        $id_juez2 = $input_id_juez2;
    }
    
	// Validate id_juez3   
    $input_id_juez3 = trim($_POST["id_juez3"]);
    if(empty($input_id_juez3)){
        $id_juez3_err = "Ingresa el id del juez 3.";
    }else{
        $id_juez3 = $input_id_juez3;
    }
	
	// Validate id_juez4   
    $input_id_juez4 = trim($_POST["id_juez4"]);
    if(empty($input_id_juez4)){
        $id_juez4_err = "Ingresa el id del juez 4.";
    }else{
        $id_juez4 = $input_id_juez4;
    }
	
    // Validate id_boxeador1   
    $input_id_boxeador1 = trim($_POST["id_boxeador1"]);
    if(empty($input_id_boxeador1)){
        $id_boxeador1_err = "Ingresa el id del boxeador 1.";
    }else{
        $id_boxeador1 = $input_id_boxeador1;
    }
	
	// Validate id_boxeador2   
    $input_id_boxeador2 = trim($_POST["id_boxeador2"]);
    if(empty($input_id_boxeador2)){
        $id_boxeador2_err = "Ingresa el id del boxeador 2.";
    }else{
        $id_boxeador2 = $input_id_boxeador2;
    }
	
	// Validate fecha   
    $input_fecha = trim($_POST["fecha"]);
    if(empty($input_fecha)){
        $fecha_err = "Ingresa la fecha de la pelea.";
    }else{
        $fecha = $input_fecha;
    }
	
	// Validate hora   
    $input_hora = trim($_POST["hora"]);
    if(empty($input_hora)){
        $hora_err = "Ingresa la hora de la pelea.";
    }else{
        $hora = $input_hora;
    }
    
    // Validate categoria
    $input_ganador = trim($_POST["ganador"]);
    if(empty($input_ganador)){
        $ganador_err = "Ingresa el ganador de la pelea.";
    } 
    else{
        $ganador = $input_ganador;
    }

    // Check input errors before inserting in database
	//$id_err = $categoria_err = $id_juez1_err = $id_juez2_err = $id_juez3_err = $id_juez4_err = $id_boxeador1_err = $id_boxeador2_err = $fecha_err = $hora_err
    if(empty($id_err) && empty($categoria_err)  && empty($division_err) && empty($id_juez1_err) && empty($id_juez2_err) && empty($id_juez3_err) && empty($id_juez4_err) && empty($id_boxeador1_err) && empty($id_boxeador2_err) && empty($fecha_err) && empty($hora_err) && empty($ganador_err)){
        $cliente = new nusoap_client("http://localhost/BOMV/controllers/ws_soap/ws_peleas_estatales.php");
		//id, categoria, id_juez1, id_juez2, id_juez3, id_juez4, id_boxeador1, id_boxeador2, fecha, hora
		$datos = array('id' => $_POST["id"], 'categoria' => $_POST["categoria"],  'division' => $_POST["division"], 'id_juez1' => $_POST["id_juez1"], 'id_juez2' => $_POST["id_juez2"], 'id_juez3' => $_POST["id_juez3"], 'id_juez4' => $_POST["id_juez4"], 'id_boxeador1' => $_POST["id_boxeador1"], 'id_boxeador2' => $_POST["id_boxeador2"], 'fecha' => $_POST["fecha"], 'hora' => $_POST["hora"], 'ganador' => $_POST["ganador"]);

		$resultado = $cliente->call('editarPeleaEstatal', $datos);
		
		$err = $cliente->getError();
		if($err){
			echo '<h2>Error del constructor</h2><pre>'.$err.'</pre>';
			echo '<h2>Request</h2><pre>'.htmlspecialchars($cliente->request, ENT_QUOTES).'</pre>';
			echo '<h2>Response</h2><pre>'.htmlspecialchars($cliente->response, ENT_QUOTES).'</pre>';
			echo '<h2>Debug</h2><pre>'.htmlspecialchars($cliente->getDebug(), ENT_QUOTES).'</pre>';
		}else{
			header("location: ../../views/admin/peleas_estatales.php");
		}
    }
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        $cliente2 = new nusoap_client("http://localhost/BOMV/controllers/ws_soap/ws_peleas_estatales.php");

        $datos = array('id' => $id);

		$resultado = $cliente2->call('buscarPeleaEstatal', $datos);
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
		}
        
    }  else{    
        // URL doesn't contain valid id. Redirect to error page
        header("location: ../tools/error.php");
        exit();
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Actualizar Pelea Estatal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 
 <!-- jQuery UI -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Actualizar pelea estatal</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <div class="form-group <?php echo (!empty($categoria_err)) ? 'has-error' : ''; ?>">
								<label>Categoria</label>
								<!--<input type="text" name="categoria" class="form-control" value="</*?php echo $categoria; ?*/>">-->
								<select class="form-control" value="<?php echo $categoria; ?>" id="" name="categoria">
									<!--<option selected="true" name="categoria" disabled="disabled" value="">Selecciona el peso</option>-->
									<option name="categoria" value="M">Masculina</option>
									<option name="categoria" value="F">Femenina</option>
								</select>
								<span class="help-block"><?php echo $categoria_err;?></span>
						</div>
                        <div class="form-group <?php echo (!empty($division_err)) ? 'has-error' : ''; ?>">
                            <label>División</label>
                            <!--<input type="text" name="categoria" class="form-control" value="</*?php echo $categoria; ?*/>">-->
                            <select class="form-control" value="<?php echo $division; ?>" id="" name="division">
                            	<!--<option selected="true" name="categoria" disabled="disabled" value="">Selecciona el peso</option>-->
								<option name="division" value="minimosca">minimosca o semimosca(48 kg)</option>
								<option name="division" value="mosca">mosca(51 kg)</option>
								<option name="division" value="gallo">gallo(54 kg)</option>
								<option name="division" value="pluma">pluma(57 kg)</option>
								<option name="division" value="ligero">ligero(60 kg)</option>
								<option name="division" value="superligero">superligero o welter jr(64 kg)</option>
								<option name="division" value="welter">welter(69 kg)</option>
								<option name="division" value="mediano">mediano o medio(75 kg)</option>
								<option name="division" value="mediopesado">mediopesado o semipesado(81 kg)</option>
								<option name="division" value="pesado">pesado(91 kg)</option>
								<option name="division" value="superpesado">superpesado(91 kg)</option>
							</select>
                            <span class="help-block"><?php echo $division_err;?></span>
                        </div>
                        
						<div class="form-group <?php echo (!empty($id_juez1_err)) ? 'has-error' : ''; ?>">
                            <label>Juez 1</label>
                            <input id="search_juez" type="text" name="id_juez1" class="form-control" value="<?php echo $id_juez1; ?>">
                            <span class="help-block"><?php echo $id_juez1_err;?></span>
                        </div>

						<div class="form-group <?php echo (!empty($id_juez2_err)) ? 'has-error' : ''; ?>">
                            <label>Juez 2</label>
                            <input id="search_juez2" type="text" name="id_juez2" class="form-control" value="<?php echo $id_juez2; ?>">
                            <span class="help-block"><?php echo $id_juez2_err;?></span>
                        </div>

						<div class="form-group <?php echo (!empty($id_juez3_err)) ? 'has-error' : ''; ?>">
                            <label>Juez 3</label>
                            <input id="search_juez3" type="text" name="id_juez3" class="form-control" value="<?php echo $id_juez3; ?>">
                            <span class="help-block"><?php echo $id_juez3_err;?></span>
                        </div>
                        
						<div class="form-group <?php echo (!empty($id_juez4_err)) ? 'has-error' : ''; ?>">
                            <label>Juez 4</label>
                            <input id="search_juez4" type="text" name="id_juez4" class="form-control" value="<?php echo $id_juez4; ?>">
                            <span class="help-block"><?php echo $id_juez4_err;?></span>
                        </div>

						<div class="form-group <?php echo (!empty($id_boxeador1_err)) ? 'has-error' : ''; ?>">
                            <label>Boxeador 1</label>
                            <input id="search_boxeador2" type="text" name="id_boxeador1" class="form-control" value="<?php echo $id_boxeador1; ?>">
                            <span class="help-block"><?php echo $id_boxeador1_err;?></span>
                        </div>

						<div class="form-group <?php echo (!empty($id_boxeador2_err)) ? 'has-error' : ''; ?>">
                            <label>Boxeador 2</label>
                            <input id="search_boxeador3" type="text" name="id_boxeador2" class="form-control" value="<?php echo $id_boxeador2; ?>">
                            <span class="help-block"><?php echo $id_boxeador2_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($id_fecha_err)) ? 'has-error' : ''; ?>">
                            <label>Fecha de la pelea</label>
                            <input type="date" name="fecha" class="form-control" value="<?php echo $fecha; ?>">
                            <span class="help-block"><?php echo $fecha_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($hora_err)) ? 'has-error' : ''; ?>">
                            <label>Hora de la pelea</label>
                            <input type="time" name="hora" class="form-control" value="<?php echo $hora; ?>" placeholder="">
                            <span class="help-block"><?php echo $hora_err;?></span>
                        </div>
						
						<div class="form-group <?php echo (!empty($ganador_err)) ? 'has-error' : ''; ?>">
                            <label>Ganador</label>
                            <input id="search_boxeador" type="text" name="ganador" class="form-control" value="<?php echo $ganador; ?>">
                            <span class="help-block"><?php echo $ganador_err;?></span>
                        </div>

                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Guardar Pelea Estatal">
                        <a href="../../views/admin/peleas_estatales.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>

    <script type="text/javascript">
		$(function() {
			$( "#search_boxeador" ).autocomplete({
			source: '../js/ajax-boxeador-search.php',
			});
		});
	</script>

	<script type="text/javascript">
		$(function() {
			$( "#search_boxeador2" ).autocomplete({
			source: '../js/ajax-boxeador-search.php',
			});
		});
	</script>

	<script type="text/javascript">
		$(function() {
			$( "#search_boxeador3" ).autocomplete({
			source: '../js/ajax-boxeador-search.php',
			});
		});
	</script>

	<script type="text/javascript">
		$(function() {
			$( "#search_juez" ).autocomplete({
			source: '../js/ajax-juez-search.php',
			});
		});
	</script>
	<script type="text/javascript">
		$(function() {
			$( "#search_juez2" ).autocomplete({
			source: '../js/ajax-juez-search.php',
			});
		});
	</script>

	<script type="text/javascript">
		$(function() {
			$( "#search_juez3" ).autocomplete({
			source: '../js/ajax-juez-search.php',
			});
		});
	</script>

	<script type="text/javascript">
		$(function() {
			$( "#search_juez4" ).autocomplete({
			source: '../js/ajax-juez-search.php',
			});
		});
	</script>
</body>
</html>