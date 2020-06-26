<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$id_boxeador = $id_gimnasio = $nombre_boxeador = $peleas_ganadas = $peleas_perdidas = $empates = $foto_boxeador ="";
$id_boxeador_err = $id_gimnasio_err = $nombre_boxeador_err = $peleas_ganadas_err = $peleas_perdidas_err = $empates_err = $foto_boxeador_err ="";
 
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate id_gimnasio
    $input_id_gimnasio = trim($_POST["id_gimnasio"]);
    if(empty($input_id_gimnasio)){
        $id_gimnasio_err = "Ingresa el id de gimnasio.";
    } 
    else{
        $id_gimnasio = $input_id_gimnasio;
    }

    // Validate nombre_boxeador
    $input_nombre_boxeador = trim($_POST["nombre_boxeador"]);
    if(empty($input_nombre_boxeador)){
        $nombre_boxeador_err = "Ingresa el nombre del boxeador.";
    }else{
        $nombre_boxeador = $input_nombre_boxeador;
    }
    
    // Validate peleas_ganadas
    $input_peleas_ganadas = trim($_POST["peleas_ganadas"]);
    $peleas_ganadas = $input_peleas_ganadas;

    // Validate peleas_perdidas
    $input_peleas_perdidas = trim($_POST["peleas_perdidas"]);
    $peleas_perdidas = $input_peleas_perdidas;
    


    // Validate empates
    $input_empates = trim($_POST["empates"]);
    $empates = $input_empates;
    

    // Validate foto_boxeador
    $input_foto_boxeador = trim($_POST["foto_boxeador"]);
    if(empty($input_foto_boxeador)){
        $foto_boxeador_err = "Ingresa la imagen del boxeador";
    } elseif(!filter_var($input_foto_boxeador, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $foto_boxeador_err = "Por favor, la imagen debe de coincidir con un formato valido de imagen.";
    } else{
        $foto_boxeador = $input_foto_boxeador;
    }
    
    // Check input errors before inserting in database
    if(empty($id_gimnasio_err) && empty($nombre_boxeador_err) && empty($peleas_ganadas_err) && empty($peleas_perdidas_err) && empty($empates_err) && empty($foto_boxeador_err)){
        // Prepare an update statement
        $sql = "UPDATE categoria_varonil_peso_welter SET id_gimnasio='{$_POST["id_gimnasio"]}', nombre_boxeador='{$_POST["nombre_boxeador"]}', peleas_ganadas='{$_POST["peleas_ganadas"]}', peleas_perdidas='{$_POST["peleas_perdidas"]}', empates='{$_POST["empates"]}', foto_boxeador='{$_POST["foto_boxeador"]}' WHERE id_boxeador='{$_POST["id"]}'";
         
        if($stmt = mysqli_prepare($link, $sql)){
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: ../index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM categoria_varonil_peso_welter WHERE id_boxeador = '{$_GET["id"]}'";
        if($stmt = mysqli_prepare($link, $sql)){
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $id_gimnasio = $row["id_gimnasio"];
                    $nombre_boxeador = $row["nombre_boxeador"];
                    $peleas_ganadas = $row["peleas_ganadas"];
                    $peleas_perdidas = $row["peleas_perdidas"];
                    $empates = $row["empates"];
                    $foto_boxeador = $row["foto_boxeador"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
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
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <div class="form-group <?php echo (!empty($id_gimnasio_err)) ? 'has-error' : ''; ?>">
                            <label>Id gimasio</label>
                            <input type="text" name="id_gimnasio" class="form-control" value="<?php echo $id_gimnasio; ?>">
                            <span class="help-block"><?php echo $id_gimnasio_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($nombre_boxeador_err)) ? 'has-error' : ''; ?>">
                            <label>Nombre boxeador</label>
                            <input type="text" name="nombre_boxeador" class="form-control" value="<?php echo $nombre_boxeador; ?>">
                            <span class="help-block"><?php echo $nombre_boxeador_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($peleas_ganadas_err)) ? 'has-error' : ''; ?>">
                            <label>Peleas ganadas</label>
                            <input type="number" name="peleas_ganadas" class="form-control" value="<?php echo $peleas_ganadas; ?>" min="0">
                            <span class="help-block"><?php echo $peleas_ganadas_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($peleas_perdidas_err)) ? 'has-error' : ''; ?>">
                            <label>Peleas perdidas</label>
                            <input type="number" name="peleas_perdidas" class="form-control" value="<?php echo $peleas_perdidas; ?>" min="0">
                            <span class="help-block"><?php echo $peleas_perdidas_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($empates_err)) ? 'has-error' : ''; ?>">
                            <label>Empates</label>
                            <input type="number" name="empates" class="form-control" value="<?php echo $empates; ?>" min="0">
                            <span class="help-block"><?php echo $empates_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($foto_boxeador_err)) ? 'has-error' : ''; ?>">
                            <label>Foto boxeador</label>
                            <input type="text" name="foto_boxeador" class="form-control" value="<?php echo $foto_boxeador; ?>">
                            <span class="help-block"><?php echo $foto_boxeador_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>