<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
$sql = "SELECT * FROM categoria_varonil_peso_welter WHERE id_boxeador = '{$_GET["id"]}'";
    
    if($stmt = mysqli_prepare($link, $sql)){
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                //yea
                // Retrieve individual field value
                $name = $row["nombre_boxeador"];

            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
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
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
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
                        <h1>View Record</h1>
                    </div>
                    <div class="form-group">
                        <label>Id boxeador</label>
                        <p class="form-control-static"><?php echo $row["id_boxeador"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Id gimnasio</label>
                        <p class="form-control-static"><?php echo $row["id_gimnasio"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Nombre</label>
                        <p class="form-control-static"><?php echo $row["nombre_boxeador"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Peleas ganadas</label>
                        <p class="form-control-static"><?php echo $row["peleas_ganadas"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Peleas perdidas</label>
                        <p class="form-control-static"><?php echo $row["peleas_perdidas"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Empates</label>
                        <p class="form-control-static"><?php echo $row["empates"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <p class="form-control-static"><?php echo $row["foto_boxeador"]; ?></p>
                    </div>
                    <p><a href="../index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
