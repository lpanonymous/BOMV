<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$id = $titulo = $fecha = $cuerpo = $foto="";
$id_err = $titulo_err = $fecha_err = $cuerpo_err = $foto_err ="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate id_boxeador
    $input_id = trim($_POST["id"]);
    if(empty($input_id)){
        $id_err = "Ingresa el id de la noticia.";
    } 
    else{
        $id = $input_id;
    }

    // Validate titulo de noticia
    $input_titulo = trim($_POST["titulo"]);
    if(empty($input_titulo)){
        $titulo_err = "Ingresa el titulo de la noticia.";
    } 
    else{
        $titulo = $input_titulo;
    }

    // Validate fecha de la notixia
    $input_fecha = trim($_POST["fecha"]);
    if(empty($input_fecha)){
        $fecha_err = "Ingresa la fecha de la noticia.";
    }else{
        $fecha = $input_fecha;
    }

    // Validate foto de la noticia
    $input_foto = trim($_POST["foto"]);
    if(empty($input_foto)){
        $foto_err = "Ingresa la imagen de la noticia";
    } elseif(!filter_var($input_foto, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $foto_err = "Por favor, la imagen debe de coincidir con un formato valido de imagen.";
    } else{
        $foto = $input_foto;
    }
    
    // Check input errors before inserting in database
    if(empty($id_err) && empty($titulo_err) && empty($fecha_err) && empty($cuerpo_err) && empty($foto_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO noticias (id, titulo, fecha, cuerpo, foto) VALUES ('{$_POST["id"]}', '{$_POST["titulo"]}', '{$_POST["fecha"]}', '{$_POST["cuerpo"]}', '{$_POST["foto"]}')";
         
        if($stmt = mysqli_prepare($link, $sql)){
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: ../views/noticias.php");
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
    <title>Crear noticia</title>
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
                        <h2>Crear noticia</h2>
                    </div>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($id_err)) ? 'has-error' : ''; ?>">
                            <label>Id</label>
                            <input type="text" name="id" class="form-control" value="<?php echo $id; ?>">
                            <span class="help-block"><?php echo $id_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($titulo_err)) ? 'has-error' : ''; ?>">
                            <label>Titulo</label>
                            <input type="text" name="titulo" class="form-control" value="<?php echo $titulo; ?>">
                            <span class="help-block"><?php echo $titulo_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($fecha_err)) ? 'has-error' : ''; ?>">
                            <label>Fecha</label>
                            <input type="date" name="fecha" class="form-control" value="<?php echo $fecha; ?>">
                            <span class="help-block"><?php echo $fecha_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($cuerpo_err)) ? 'has-error' : ''; ?>">
                            <label>Cuerpo</label>
                            <input type="text" name="cuerpo" class="form-control" value="<?php echo $cuerpo; ?>">
                            <span class="help-block"><?php echo $cuerpo_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($foto_err)) ? 'has-error' : ''; ?>">
                            <label>Foto</label>
                            <input type="text" name="foto" class="form-control" value="<?php echo $foto; ?>">
                            <span class="help-block"><?php echo $foto_err;?></span>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Agregar noticia">
                        <a href="../views/noticias.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>