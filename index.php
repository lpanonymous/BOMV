<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
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
                        <h2 class="pull-left">Resultados de categoria varonil peso welter</h2>
                        <a href="controllers/create.php" class="btn btn-success pull-right">Agregar nuevo resultado</a>
                    </div>
                    <?php //hola soy leo
                    // Include config file
                    require_once "controllers/config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM categoria_varonil_peso_welter ORDER BY peleas_ganadas DESC, peleas_perdidas ASC, empates DESC";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Id boxeador</th>";
                                        echo "<th>Id gimnasio</th>";
                                        echo "<th>Nombre</th>";
                                        echo "<th>Peleas ganadas</th>";
                                        echo "<th>Peleas perdidas</th>";
                                        echo "<th>Empates</th>";
                                        echo "<th>Foto boxeador</th>";
                                        echo "<th>Funciones</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id_boxeador'] . "</td>";
                                        echo "<td>" . $row['id_gimnasio'] . "</td>";
                                        echo "<td>" . $row['nombre_boxeador'] . "</td>";
                                        echo "<td>" . $row['peleas_ganadas'] . "</td>";
                                        echo "<td>" . $row['peleas_perdidas'] . "</td>";
                                        echo "<td>" . $row['empates'] . "</td>";
                                        echo "<td>" . $row['foto_boxeador'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='controllers/read.php?id=". $row['id_boxeador'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='controllers/update.php?id=". $row['id_boxeador'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='controllers/delete.php?id=". $row['id_boxeador'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
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