<?php
require_once('lib/nusoap.php');
// Define variables and initialize with empty values
$id = $nombre = $ubicacion = $telefono = $facebook = $email = $descripcion = $nombre_foto ="";
$id_err = $nombre_err = $ubicacion_err = $telefono_err = $facebook_err = $email_err = $descripcion_err = $nombre_foto_err ="";
 
 
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

    $tmpfile = $_FILES["foto"]["tmp_name"];   // temp filename
    $filename = $_FILES["foto"]["name"];      // Original filename

    $handle = fopen($tmpfile, "r");                  // Open the temp file
    $contents = fread($handle, filesize($tmpfile));  // Read the temp file
    fclose($handle);                                 // Close the temp file
    $decodeContent   = base64_encode($contents);     // Decode the file content, so that we code send a binary string to SOAP
    
    // Check input errors before inserting in database
    if(empty($id_err) && empty($nombre_err) && empty($ubicacion_err) && empty($telefono_err) && empty($facebook_err) && empty($email_err) && empty($descripcion_err)){
        $cliente = new nusoap_client("http://localhost/BOMV/controllers/ws_soap/ws_gimnasios.php");

		$datos = array('id' => $_POST["id"], 'nombre' => $_POST["nombre"], 'ubicacion' => $_POST["ubicacion"], 'telefono' => $_POST["telefono"], 'facebook' => $_POST["facebook"], 'email' => $_POST["email"], 'descripcion' => $_POST["descripcion"], 'foto' => $decodeContent, 'nombre_foto' => $filename);

        $resultado = $cliente->call('editarGimnasio', $datos);
        
	    header("location: ../../views/admin/gimnasios.php");
    }
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        $cliente2 = new nusoap_client("http://localhost/BOMV/controllers/ws_soap/ws_gimnasios.php");

        $datos = array('id' => $id);

		$resultado = $cliente2->call('buscarGimnasio', $datos);
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
            $nombre = $obj->nombre;
            $ubicacion = $obj->ubicacion;
            $telefono = $obj->telefono;
            $facebook = $obj->facebook;
            $email = $obj->email;
            $descripcion = $obj->descripcion;
            $nombre_foto = $obj->nombre_foto;
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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Actualizar gimnasio</title>
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
                        <h2>Actualizar gimnasio</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" enctype="multipart/form-data">
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
                        
                        <div class="form-group">
                            <img src="http://localhost/BOMV/resources/images/gimnasios/<?php echo $nombre_foto; ?>" class="img-fluid" alt="Imagen">
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" name="foto" class="form-control" value="http://localhost/BOMV/resources/images/noticias/<?php echo $nombre_foto; ?>" multiple> 
                            </div>
                        </div>

                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Guardar Gimnasio">
                        <a href="../../views/admin/gimnasios.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>