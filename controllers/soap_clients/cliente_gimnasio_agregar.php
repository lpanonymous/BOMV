<?php
	require_once('lib/nusoap.php');

	// Define variables and initialize with empty values
	$id = $nombre = $ubicacion = $telefono = $facebook = $email = $descripcion = $foto ="";
	$id_err = $nombre_err = $ubicacion_err = $telefono_err = $facebook_err = $email_err = $descripcion_err = $foto_err ="";
	
	// Processing form data when form is submitted
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		// Validate id
		$input_id = trim($_POST["id"]);
		if(empty($input_id)){
			$id_err = "Please enter a id.";
		} 
		else{
			$id = $input_id;
		}
		// Validate nombre
		$input_nombre = trim($_POST["nombre"]);
		if(empty($input_nombre)){
			$nombre_err = "Ingresa nombre del gimnasio.";
		} 
		else{
			$nombre = $input_nombre;
		}

		// Validate ubicacion   
		$input_ubicacion = trim($_POST["ubicacion"]);
		if(empty($input_ubicacion)){
			$ubicacion_err = "Ingresa la ubicación.";
		}else{
			$ubicacion = $input_ubicacion;
		}
		
		// Validate telefono
		$input_telefono = trim($_POST["telefono"]);
		if(empty($input_telefono)){
			$telefono_err = "Ingresa el telefono.";
		}else{
			$telefono = $input_telefono;
		}
		
		// Validate facebook   
		$input_facebook = trim($_POST["facebook"]);
		if(empty($input_facebook)){
			$facebook_err = "Ingresa el Facebook del Gimnasio.";
		}else{
			$facebook= $input_facebook;
		}
		
		// Validate email
		$input_email = trim($_POST["email"]);
		if(empty($input_email)){
			$email_err = "Ingresa el email.";
		}else{
			$email = $input_email;
		}
		
		// Validate descripción   
		$input_descripcion = trim($_POST["descripcion"]);
		if(empty($input_descripcion)){
			$descripcion_err = "Ingresa la descripción del Gimnasio.";
		}else{
			$descripcion= $input_descripcion;
		}

		// Validate foto
		$input_foto = trim($_POST["foto"]);
		if(empty($input_foto)){
			$foto_err = "Ingresa la imagen del gimnasio";
		} else{
			$foto = $input_foto;
		}
		
		// Check input errors before inserting in database
		if(empty($id_err) && empty($nombre_err) && empty($ubicacion_err) && empty($telefono_err) && empty($facebook_err) && empty($email_err) && empty($descripcion_err) && empty($foto_err)){
			$cliente = new nusoap_client("http://localhost/BOMV/ws_soap/ws_gimnasio.php");

			$datos = array('id' => $_POST["id"], 'nombre' => $_POST["nombre"], 'ubicacion' => $_POST["ubicacion"], 'telefono' => $_POST["telefono"], 'facebook' => $_POST["facebook"], 'email' => $_POST["email"], 'descripcion' => $_POST["descripcion"], 'foto' => $_POST["foto"]);

			$resultado = $cliente->call('agregarGimnasio', $datos);
			
			$err = $cliente->getError();
			if($err){
				echo '<h2>Error del constructor</h2><pre>'.$err.'</pre>';
				echo '<h2>Request</h2><pre>'.htmlspecialchars($cliente->request, ENT_QUOTES).'</pre>';
				echo '<h2>Response</h2><pre>'.htmlspecialchars($cliente->response, ENT_QUOTES).'</pre>';
				echo '<h2>Debug</h2><pre>'.htmlspecialchars($cliente->getDebug(), ENT_QUOTES).'</pre>';
			}else{
				header("location: ../../views/gimnasios.php");
				//echo '<h2>Resultado</h2><pre>'; print_r($resultado); echo '</pre>';
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Crear gimnasio</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
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
                        <h2>Crear gimnasio</h2>
                    </div>
                    <p>Porfavor ingresa los datos y luego da clic en agregar gimnasio para almacenarlo en la base de datos.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($id)) ? 'has-error' : ''; ?>">
                            <label>Id</label>
                            <input type="text" name="id" class="form-control" value="<?php echo $id; ?>">
                            <span class="help-block"><?php echo $id_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($nombre_err)) ? 'has-error' : ''; ?>">
                            <label>Nombre</label>
                            <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>">
                            <span class="help-block"><?php echo $nombre_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($ubicacion_err)) ? 'has-error' : ''; ?>">
                            <label>Ubicación</label>
                            <input type="text" name="ubicacion" class="form-control" value="<?php echo $ubicacion; ?>" placeholder="Dirección de google maps">
                            <span class="help-block"><?php echo $ubicacion_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($telefono_err)) ? 'has-error' : ''; ?>">
                            <label>Telefono</label>
                            <input type="text" name="telefono" class="form-control" value="<?php echo $telefono; ?>">
                            <span class="help-block"><?php echo $telefono_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($facebook_err)) ? 'has-error' : ''; ?>">
                            <label>Facebook</label>
                            <input type="text" name="facebook" class="form-control" value="<?php echo $facebook; ?>">
                            <span class="help-block"><?php echo $facebook_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                            <span class="help-block"><?php echo $email_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($descripcion_err)) ? 'has-error' : ''; ?>">
                            <label>Descripción</label>
                            <input type="text" name="descripcion" class="form-control" value="<?php echo $descripcion; ?>">
                            <span class="help-block"><?php echo $descripcion;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($foto_err)) ? 'has-error' : ''; ?>">
                            <label>Foto</label>
                            <input type="text" name="foto" class="form-control" value="<?php echo $foto; ?>" placeholder="Dirección de internet de la imágen">
                            <span class="help-block"><?php echo $foto_err;?></span>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Agregar Gimnasio">
                        <a href="../../views/gimnasios.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>