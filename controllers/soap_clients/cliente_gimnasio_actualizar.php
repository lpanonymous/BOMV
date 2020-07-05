<?php
require_once('lib/nusoap.php');
// Define variables and initialize with empty values
$id = $nombre = $ubicacion = $telefono = $facebook = $email = $descripcion = $foto ="";
$id_err = $nombre_err = $ubicacion_err = $telefono_err = $facebook_err = $email_err = $descripcion_err = $foto_err ="";
 
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
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

		$resultado = $cliente->call('editarGimnasio', $datos);
		
		$err = $cliente->getError();
		if($err){
			echo '<h2>Error del constructor</h2><pre>'.$err.'</pre>';
			echo '<h2>Request</h2><pre>'.htmlspecialchars($cliente->request, ENT_QUOTES).'</pre>';
			echo '<h2>Response</h2><pre>'.htmlspecialchars($cliente->response, ENT_QUOTES).'</pre>';
			echo '<h2>Debug</h2><pre>'.htmlspecialchars($cliente->getDebug(), ENT_QUOTES).'</pre>';
		}else{
			header("location: ../../views/gimnasios.php");
		}
    }
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        $cliente2 = new nusoap_client("http://localhost/BOMV/ws_soap/ws_gimnasio.php");

        $datos = array('id' => $id);

		$resultado = $cliente2->call('buscarGimnasio', $datos);
		
		$err = $cliente2->getError();
		if($err){
			echo '<h2>Error del constructor</h2><pre>'.$err.'</pre>';
			echo '<h2>Request</h2><pre>'.htmlspecialchars($cliente2->request, ENT_QUOTES).'</pre>';
			echo '<h2>Response</h2><pre>'.htmlspecialchars($cliente2->response, ENT_QUOTES).'</pre>';
			echo '<h2>Debug</h2><pre>'.htmlspecialchars($cliente2->getDebug(), ENT_QUOTES).'</pre>';
        }
        else
        {
            $array = explode("<", $resultado);
			$nombre = $array[1];
            $ubicacion = $array[2];
            $telefono = $array[3];
            $facebook = $array[4];
            $email = $array[5];
            $descripcion = $array[6];
            $foto = $array[7];
		}
        
    }  else{    
        // URL doesn't contain valid id. Redirect to error page
        header("location: ../error.php");
        exit();
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Actualizar gimnasio</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
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
                        <h2>Actualizar gimnasio</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
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
                            <span class="help-block"><?php echo $descripcion_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($foto_err)) ? 'has-error' : ''; ?>">
                            <label>Foto</label>
                            <input type="text" name="foto" class="form-control" value="<?php echo $foto; ?>" placeholder="Dirección de internet de la imágen">
                            <span class="help-block"><?php echo $foto_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Guardar Gimnasio">
                        <a href="../../views/gimnasios.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>