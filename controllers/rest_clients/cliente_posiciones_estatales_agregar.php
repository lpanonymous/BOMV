<?php
 
// Define variables and initialize with empty values
$alias_boxeador = $gimnasio = $categoria = $division = $peleas_ganadas = $peleas_perdidas = $empates = "";
$alias_boxeador_err = $gimnasio_err = $categoria_err = $division_err = $peleas_ganadas_err = $peleas_perdidas_err = $empates_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate alias_boxeador
    $input_alias_boxeador = trim($_POST["alias_boxeador"]);
    if(empty($input_alias_boxeador)){
        $alias_boxeador_err = "Ingresa el alias del boxeador.";
    } 
    else{
        $alias_boxeador = $input_alias_boxeador;
    }

    // Validate gimnasio
    $input_gimnasio = trim($_POST["gimnasio"]);
    if(empty($input_gimnasio)){
        $gimnasio_err = "Ingresa el gimnasio.";
    } 
    else{
        $gimnasio = $input_gimnasio;
    }

    // Validate categoria
    $input_categoria = trim($_POST["categoria"]);
    if(empty($input_categoria)){
        $categoria_err = "Ingresa la categoria.";
    } 
    else{
        $categoria = $input_categoria;
    }

    // Validate division
    $input_division = trim($_POST["division"]);
    if(empty($input_division)){
        $division_err = "Ingresa la división.";
    } 
    else{
        $division = $input_division;
    }

    // Validate peleas ganadas
    $input_peleas_ganadas = trim($_POST["peleas_ganadas"]);
    if(empty($input_peleas_ganadas)){
        $peleas_ganadas_err = "Ingresa el número de peleas ganadas.";
    } 
    else{
        $peleas_ganadas = $input_peleas_ganadas;
    }

    // Validate peleas perdidas
    $input_peleas_perdidas = trim($_POST["peleas_perdidas"]);
    if(empty($input_peleas_perdidas)){
        $peleas_perdidas_err = "Ingresa el número de peleas perdidas.";
    } 
    else{
        $peleas_perdidas = $input_peleas_perdidas;
    }

    // Validate empates
    $input_empates = trim($_POST["empates"]);
    if(empty($input_empates)){
        $empates_err = "Ingresa el número de empates.";
    } 
    else{
        $empates = $input_empates;
    }

    // Check input errors before inserting in database
    if(empty($alias_boxeador_err) && empty($gimnasio_err) && empty($categoria_err) && empty($division_err))
    {
        $postData = array(
            'alias_boxeador'=>$_POST["alias_boxeador"],
            'gimnasio'=>$_POST["gimnasio"],
            'categoria'=>$_POST["categoria"],
            'division'=>$_POST["division"],
            'peleas_ganadas'=>$_POST["peleas_ganadas"],
            'peleas_perdidas'=>$_POST["peleas_perdidas"],
            'empates'=>$_POST["empates"]
        );

        print_r($postData);
        //url contra la que atacamos
        $ch = curl_init("http://localhost/BOMV/controllers/ws_rest/posiciones_generales_estatales_rest.php");
        //a true, obtendremos una respuesta de la url, en otro caso, 
        //true si es correcto, false si no lo es
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //establecemos el verbo http que queremos utilizar para la petición
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        //enviamos el array data
        curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($postData));
        //obtenemos la respuesta
        $response = curl_exec($ch);
        // Se cierra el recurso CURL y se liberan los recursos del sistema
        curl_close($ch);
        if(!$response) {
            return false;
        }else{
            header("location: ../../views/admin/posiciones_estatales.php");
        }
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Crear posicion</title>
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
                        <h2>Crear posición estatal</h2>
                    </div>
                    <p>Porfavor llena el formulario para almacenar la posición en la base de datos.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($alias_boxeador_err)) ? 'has-error' : ''; ?>">
                            <label>Alias Boxeador(a)</label>
                            <input id="search_boxeador" type="text" name="alias_boxeador" maxlength="100" class="form-control" value="<?php echo $alias_boxeador; ?>">
                            <span class="help-block"><?php echo $alias_boxeador_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($gimnasio_err)) ? 'has-error' : ''; ?>">
                            <label>Gimnasio</label>
                            <input id="search_gimnasio" type="text" name="gimnasio" class="form-control" maxlength="50" value="<?php echo $gimnasio; ?>">
                            <span class="help-block"><?php echo $gimnasio_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($categoria_err)) ? 'has-error' : ''; ?>">
								<label>Categoría</label>
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
                        <div class="form-group <?php echo (!empty($peleas_ganadas_err)) ? 'has-error' : ''; ?>">
                            <label>#Peleas ganadas</label>
                            <input type="number" name="peleas_ganadas" maxlength="11" class="form-control" value="<?php echo $peleas_ganadas; ?>" min="0">
                            <span class="help-block"><?php echo $peleas_ganadas_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($peleas_perdidas_err)) ? 'has-error' : ''; ?>">
                            <label>#Peleas perdidas</label>
                            <input type="number" name="peleas_perdidas" maxlength="11" class="form-control" value="<?php echo $peleas_perdidas; ?>" min="0">
                            <span class="help-block"><?php echo $peleas_perdidas_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($empates_err)) ? 'has-error' : ''; ?>">
                            <label>#Empates</label>
                            <input type="number" name="empates" maxlength="11" class="form-control" value="<?php echo $empates; ?>" min="0">
                            <span class="help-block"><?php echo $empates_err;?></span>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Agregar">
                        <a href="../../views/admin/posiciones_estatales.php" class="btn btn-default">Cancelar</a>
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
			$( "#search_gimnasio" ).autocomplete({
			source: '../js/ajax-gimnasio-search.php',
			});
		});
	</script>
</body>
</html>