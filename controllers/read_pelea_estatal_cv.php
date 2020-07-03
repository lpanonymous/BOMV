<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
$sql = "SELECT * FROM peleas_estatales_categoria_varonil WHERE id = '{$_GET["id"]}'";
    
    if($stmt = mysqli_prepare($link, $sql)){
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

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
    <title>Ver pelea</title>
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
                        <h1>Ver pelea</h1>
                    </div>
                    <div class="form-group">
                        <label>Id</label>
                        <p class="form-control-static"><?php echo $row["id"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Categoria</label>
                        <p class="form-control-static"><?php echo $row["categoria"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Id juez 1</label>
                        <p class="form-control-static"><?php echo $row["id_juez1"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Id juez 2</label>
                        <p class="form-control-static"><?php echo $row["id_juez2"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Id juez 3</label>
                        <p class="form-control-static"><?php echo $row["id_juez3"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Id juez 4</label>
                        <p class="form-control-static"><?php echo $row["id_juez4"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Id boxeador 1</label>
                        <p class="form-control-static"><?php echo $row["id_boxeador1"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Id boxeador 2</label>
                        <p class="form-control-static"><?php echo $row["id_boxeador2"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Fecha</label>
                        <p class="form-control-static"><?php echo $row["fecha"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Hora</label>
                        <p class="form-control-static"><?php echo $row["hora"]; ?></p>
                    </div>
                    <p><a href="../views/peleas_estatales_cv.php" class="btn btn-primary">Volver</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
