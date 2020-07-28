<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"])))
{
    $id =  trim($_GET["id"]);
    // CONSULTAR UN REGISTRO
    $ch = curl_init();  
    curl_setopt($ch, CURLOPT_URL, 'http://localhost/BOMV/controllers/ws_rest/posiciones_generales_estatales_rest.php?id='.$id.'');  //Cambiar url
    curl_setopt($ch, CURLOPT_HEADER, false);  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  

    // REGRESO
    $data = curl_exec($ch);    
    curl_close($ch);
    $array = json_decode($data);
    
    $alias_boxeador = $array->alias_boxeador;
    $gimnasio = $array->gimnasio;
    $categoria = $array->categoria;
    $division = $array->division;
    $peleas_ganadas = $array->peleas_ganadas;
    $peleas_perdidas = $array->peleas_perdidas;
    $empates = $array->empates;
} 
else
{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: ../tools/error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ver posicion</title>
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
                        <h1>Detalles de la posición de pelea estatal</h1>
                    </div>
                    <div class="form-group">
                        <label>Id</label>
                        <p class="form-control-static"><?php echo $id; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Alias del boxeador</label>
                        <p class="form-control-static"><?php echo $alias_boxeador; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Gimnasio</label>
                        <p class="form-control-static"><?php echo $gimnasio; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Categoría</label>
                        <p class="form-control-static"><?php echo $categoria; ?></p>
                    </div>
                    <div class="form-group">
                        <label>División</label>
                        <p class="form-control-static"><?php echo $division; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Peleas ganadas</label>
                        <p class="form-control-static"><?php echo $peleas_ganadas; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Peleas perdidas</label>
                        <p class="form-control-static"><?php echo $peleas_perdidas; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Empates</label>
                        <p class="form-control-static"><?php echo $empates; ?></p>
                    </div>
                    <p><a href="../../views/admin/posiciones_estatales.php" class="btn btn-primary">Regresar</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
