<?php
// Include config file
require_once "config.php";
 
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
    } elseif(!filter_var($input_foto, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $foto_err = "Por favor, la imagen debe de coincidir con un formato valido de imagen.";
    } else{
        $foto = $input_foto;
    }
    
    // Check input errors before inserting in database
    if(empty($id_err) && empty($nombre_err) && empty($ubicacion_err) && empty($telefono_err) && empty($facebook_err) && empty($email_err) && empty($descripcion_err) && empty($foto_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO gimnasio (id, nombre, ubicacion, telefono, facebook, email, descripcion, foto) VALUES ('{$_POST["id"]}', '{$_POST["nombre"]}', '{$_POST["ubicacion"]}', '{$_POST["telefono"]}', '{$_POST["facebook"]}', '{$_POST["email"]}', '{$_POST["descripcion"]}', '{$_POST["foto"]}')";
         
        if($stmt = mysqli_prepare($link, $sql)){
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: ../views/gimnasios.php");
                echo "Registro exitoso.";
                exit();
            } else{
                echo "Algo salió mal.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    // Close connection
    mysqli_close($link);
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crear gimnasio</title>
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
                        <h2>Crear gimnasio</h2>
                    </div>
                    <p>Please fill this form and submit to add employee record to the database.</p>
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
                            <input type="text" name="ubicacion" class="form-control" value="<?php echo $ubicacion; ?>">
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
                            <input type="text" name="foto" class="form-control" value="<?php echo $foto; ?>">
                            <span class="help-block"><?php echo $foto_err;?></span>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Agregar Gimnasio">
                        <a href="../views/gimnasios.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>