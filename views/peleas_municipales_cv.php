<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Peleas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Programa de peleas municipales de la categoria varonil</h2>
                        <a href="../controllers/create_pelea_municipal_cv.php" class="btn btn-success pull-right">Agregar nueva pelea</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "../controllers/config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM peleas_municipios_categoria_varonil";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Id pelea</th>";
                                        echo "<th>Categoria</th>";
                                        echo "<th>Id juez 1</th>";
                                        echo "<th>Id juez 2</th>";
                                        echo "<th>Id juez 3</th>";
                                        echo "<th>Id juez 4</th>";
                                        echo "<th>Id boxeador 1</th>";
                                        echo "<th>Id boxeador 2</th>";
                                        echo "<th>Fecha</th>";
                                        echo "<th>Hora</th>";
                                        echo "<th>Funciones</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['categoria'] . "</td>";
                                        echo "<td>" . $row['id_juez1'] . "</td>";
                                        echo "<td>" . $row['id_juez2'] . "</td>";
                                        echo "<td>" . $row['id_juez3'] . "</td>";
                                        echo "<td>" . $row['id_juez4'] . "</td>";
                                        echo "<td>" . $row['id_boxeador1'] . "</td>";
                                        echo "<td>" . $row['id_boxeador2'] . "</td>";
                                        echo "<td>" . $row['fecha'] . "</td>";
                                        echo "<td>" . $row['hora'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='../controllers/read_pelea_municipal_cv.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='../controllers/update_pelea_municipal_cv.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='../controllers/delete_pelea_municipal_cv.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No hay registros.</em></p>";
                        }
                    } else{
                        echo "ERROR: uteCould not able to exec $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>