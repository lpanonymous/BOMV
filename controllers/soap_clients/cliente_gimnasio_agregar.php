<?php
require_once('lib/nusoap.php');
// Define variables and initialize with empty values
$nombre = $ubicacion = $telefono = $facebook = $email = $descripcion = $foto ="";
$nombre_err = $ubicacion_err = $telefono_err = $facebook_err = $email_err = $descripcion_err = $foto_err ="";
 
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

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
    if(empty($nombre_err) && empty($ubicacion_err) && empty($telefono_err) && empty($facebook_err) && empty($email_err) && empty($descripcion_err)){
        $cliente = new nusoap_client("http://localhost/BOMV/controllers/ws_soap/ws_gimnasios.php");

		$datos = array('nombre' => $_POST["nombre"], 'ubicacion' => $_POST["ubicacion"], 'telefono' => $_POST["telefono"], 'facebook' => $_POST["facebook"], 'email' => $_POST["email"], 'descripcion' => $_POST["descripcion"], 'foto' => $decodeContent, 'nombre_foto' => $filename);

        $resultado = $cliente->call('agregarGimnasio', $datos);
        
	    header("location: ../../views/admin/gimnasios.php");
    }
} 
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Agregar gimnasio</title>
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
                        <h2>Agregar gimnasio</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group <?php echo (!empty($nombre_err)) ? 'has-error' : ''; ?>">
                            <label>Nombre</label>
                            <input type="text" name="nombre" maxlength="50" minlength="0" class="form-control" value="<?php echo $nombre; ?>">
                            <span class="help-block"><?php echo $nombre_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($ubicacion_err)) ? 'has-error' : ''; ?>">
                            <label>Ubicación</label>
                            <input type="text" name="ubicacion" max="300" min="0" maxlength="300" minlength="0" class="form-control" value="<?php echo $ubicacion; ?>" placeholder="Dirección de google maps">
                            <span class="help-block"><?php echo $ubicacion_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($telefono_err)) ? 'has-error' : ''; ?>">
                            <label>Telefono</label>
                            <input type="text" name="telefono" min="0" maxlength="50" minlength="0" pattern="{0-9}" class="form-control" value="<?php echo $telefono; ?>">
                            <span class="help-block"><?php echo $telefono_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($facebook_err)) ? 'has-error' : ''; ?>">
                            <label>Facebook</label>
                            <input type="text" name="facebook" max="50" min="0" maxlength="50" minlength="0" class="form-control" value="<?php echo $facebook; ?>">
                            <span class="help-block"><?php echo $facebook_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="text" name="email" max="100" min="0" maxlength="100" minlength="0" class="form-control" value="<?php echo $email; ?>">
                            <span class="help-block"><?php echo $email_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($descripcion_err)) ? 'has-error' : ''; ?>">
                            <label>Descripción</label>
                            <input type="text" name="descripcion" max="500" min="0" maxlength="500" minlength="0" class="form-control" value="<?php echo $descripcion; ?>">
                            <span class="help-block"><?php echo $descripcion_err;?></span>
                        </div>
                        
                        <div class="form-group <?php echo (!empty($foto_err)) ? 'has-error' : ''; ?>">
                            <label>Foto</label>
                            <input type="file" name="foto" class="form-control" value="<?php echo $foto; ?>" multiple accept="image/*">
                            <span class="help-block"><?php echo $foto_err;?></span> 
                        </div>

                        <input type="submit" class="btn btn-primary" value="Guardar Gimnasio">
                        <a href="../../views/admin/gimnasios.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>