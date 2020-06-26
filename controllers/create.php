<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$id_boxeador = $id_gimnasio = $nombre_boxeador = $peleas_ganadas = $peleas_perdidas = $empates = $foto_boxeador ="";
$id_boxeador_err = $id_gimnasio_err = $nombre_boxeador_err = $peleas_ganadas_err = $peleas_perdidas_err = $empates_err = $foto_boxeador_err ="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate id_boxeador
    $input_id_boxeador = trim($_POST["id_boxeador"]);
    if(empty($input_id_boxeador)){
        $id_boxeador_err = "Please enter a name.";
    } 
    else{
        $id_boxeador = $input_id_boxeador;
    }

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
    if(empty($id_boxeador_err) && empty($id_gimnasio_err) && empty($nombre_boxeador_err) && empty($peleas_ganadas_err) && empty($peleas_perdidas_err) && empty($empates_err) && empty($foto_boxeador_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO categoria_varonil_peso_welter (id_boxeador, id_gimnasio, nombre_boxeador, peleas_ganadas, peleas_perdidas,empates,foto_boxeador) VALUES ('{$_POST["id_boxeador"]}', '{$_POST["id_gimnasio"]}', '{$_POST["nombre_boxeador"]}', '{$_POST["peleas_ganadas"]}', '{$_POST["peleas_perdidas"]}', '{$_POST["empates"]}', '{$_POST["foto_boxeador"]}')";
         
        if($stmt = mysqli_prepare($link, $sql)){
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: ../index.php");
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
    <title>Crear resultado</title>
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
                        <h2>Crear resultado</h2>
                    </div>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($id_boxeador_err)) ? 'has-error' : ''; ?>">
                            <label>Id boxeador</label>
                            <input type="text" name="id_boxeador" class="form-control" value="<?php echo $id_boxeador; ?>">
                            <span class="help-block"><?php echo $id_boxeador_err;?></span>
                        </div>
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

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>