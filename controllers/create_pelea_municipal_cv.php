<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$id = $categoria = $id_juez1 = $id_juez2 = $id_juez3 = $id_juez4 = $id_boxeador1 = $id_boxeador2 = $fecha = $hora ="";
$id_err = $categoria_err = $id_juez1_err = $id_juez2_err = $id_juez3_err = $id_juez4_err = $id_boxeador1_err = $id_boxeador2_err = $fecha_err = $hora_err ="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate id_pelea
    $input_id = trim($_POST["id"]);
    if(empty($input_id)){ 
        $id_err = "Please enter a id.";
    } 
    else{
        $id = $input_id;
    }

    // Validate categoria
    $input_categoria = trim($_POST["categoria"]);
    if(empty($input_categoria)){
        $categoria_err = "Ingresa la categoria.";
    } 
    else{
        $categoria = $input_categoria;
    }

    // Validate id_juez1
    $input_id_juez1 = trim($_POST["id_juez1"]);
    if(empty($input_id_juez1)){
        $id_juez1_err = "Ingresa el ID del juez 1.";
    }else{
        $id_juez1 = $input_id_juez1;
    }
    
    // Validate id_juez2
    $input_id_juez2 = trim($_POST["id_juez2"]);
    if(empty($input_id_juez2)){
        $id_juez2_err = "Ingresa el ID del juez 2.";
    }else{
        $id_juez2 = $input_id_juez2;
    }

    // Validate id_juez3
    $input_id_juez3 = trim($_POST["id_juez3"]);
    if(empty($input_id_juez3)){
        $id_juez3_err = "Ingresa el ID del juez 3.";
    }else{
        $id_juez3 = $input_id_juez3;
    }

    // Validate id_juez4
    $input_id_juez4 = trim($_POST["id_juez4"]);
    if(empty($input_id_juez4)){
        $id_juez4_err = "Ingresa el ID del juez 4.";
    }else{
        $id_juez4 = $input_id_juez4;
    }
    
    // Validate id_boxeador1
    $input_id_boxeador1 = trim($_POST["id_boxeador1"]);
    if(empty($input_id_boxeador1)){
        $id_boxeador1_err = "Ingresa el ID del boxeador 1.";
    }
    $id_boxeador1 = $input_id_boxeador1;

    // Validate id_boxeador2
    $input_id_boxeador2 = trim($_POST["id_boxeador2"]);
    if(empty($input_id_boxeador2)){
        $id_boxeador2_err = "Ingresa el ID del boxeador.";
    }
    $id_boxeador2 = $input_id_boxeador2;
    
    // Validate fecha
    $input_fecha = trim($_POST["fecha"]);
    if(empty($input_fecha)){
        $fecha_err = "Ingresa la fecha.";
    } 
    else{
        $fecha = $input_fecha;
    }    

    // Validate hora
    $input_hora = trim($_POST["hora"]);
    if(empty($input_hora)){
        $hora_err = "Ingresa la hora."; 
    } 
    else{
        $hora = $input_hora;
    }
    
    // Check input errors before inserting in database
    if(empty($id_err) && empty($categoria_err) && empty($id_juez1_err) && empty($id_juez2_err) && empty($id_juez3_err) && empty($id_juez4_err) && empty($id_boxeador1_err) && empty($id_boxeador2_err) && empty($fecha_err) && empty($hora_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO peleas_municipios_categoria_varonil (id, categoria, id_juez1, id_juez2, id_juez3, id_juez4, id_boxeador1, id_boxeador2, fecha, hora) VALUES ('{$_POST["id"]}', '{$_POST["categoria"]}', '{$_POST["id_juez1"]}', '{$_POST["id_juez2"]}', '{$_POST["id_juez3"]}', '{$_POST["id_juez4"]}', '{$_POST["id_boxeador1"]}', '{$_POST["id_boxeador2"]}', '{$_POST["fecha"]}', '{$_POST["hora"]}')";
        
        if($stmt = mysqli_prepare($link, $sql)){
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: ../views/peleas_municipales_cv.php");
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
    <title>Crear pelea municipal categoria varonil</title>
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
                        <h2>Crear pelea</h2>
                    </div>
                    <p>Please fill this form and submit to add fight record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($id_err)) ? 'has-error' : ''; ?>">
                            <label>Id</label>
                            <input type="text" name="id" class="form-control" value="<?php echo $id_err; ?>">
                            <span class="help-block"><?php echo $id_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($categoria_err)) ? 'has-error' : ''; ?>">
                            <label>Categoria</label>
                            <input type="text" name="categoria" class="form-control" value="<?php echo $categoria; ?>">
                            <span class="help-block"><?php echo $categoria_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($id_juez1_err)) ? 'has-error' : ''; ?>">
                            <label>Id juez 1</label>
                            <input type="text" name="id_juez1" class="form-control" value="<?php echo $id_juez1; ?>">
                            <span class="help-block"><?php echo $id_juez1_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($id_juez2_err)) ? 'has-error' : ''; ?>">
                            <label>Id juez 2</label>
                            <input type="text" name="id_juez2" class="form-control" value="<?php echo $id_juez2; ?>">
                            <span class="help-block"><?php echo $id_juez2_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($id_juez3_err)) ? 'has-error' : ''; ?>">
                            <label>Id juez 3</label>
                            <input type="text" name="id_juez3" class="form-control" value="<?php echo $id_juez3; ?>">
                            <span class="help-block"><?php echo $id_juez3_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($id_juez4_err)) ? 'has-error' : ''; ?>">
                            <label>Id juez 4</label>
                            <input type="text" name="id_juez4" class="form-control" value="<?php echo $id_juez4; ?>">
                            <span class="help-block"><?php echo $id_juez4_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($id_boxeador1_err)) ? 'has-error' : ''; ?>">
                            <label>Id boxeador 1</label>
                            <input type="text" name="id_boxeador1" class="form-control" value="<?php echo $id_boxeador1; ?>">
                            <span class="help-block"><?php echo $id_boxeador1_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($id_boxeador2_err)) ? 'has-error' : ''; ?>">
                            <label>Id boxeador 2</label>
                            <input type="text" name="id_boxeador2" class="form-control" value="<?php echo $id_boxeador2; ?>">
                            <span class="help-block"><?php echo $id_boxeador2_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($fecha_err)) ? 'has-error' : ''; ?>">
                            <label>Fecha</label>
                            <input type="date" name="fecha" class="form-control" value="<?php echo $fecha; ?>">
                            <span class="help-block"><?php echo $fecha_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($hora_err)) ? 'has-error' : ''; ?>">
                            <label>Hora</label>
                            <input type="time" name="hora" class="form-control" value="<?php echo $hora; ?>">
                            <span class="help-block"><?php echo $hora_err;?></span>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../views/peleas_municipales_cv.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>