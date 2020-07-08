<?php
require_once('lib/nusoap.php');
 
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
        $cliente = new nusoap_client("http://localhost/BOMV/ws_soap/ws_gimnasio.php");

        $datos = array('id' => $_POST["id"], 'titulo' => $_POST["titulo"], 'fecha' => $_POST["fecha"], 'cuerpo' => $_POST["cuerpo"], 'foto' => $_POST["foto"]);

        $resultado = $cliente->call('agregarNoticia', $datos);
        
        $err = $cliente->getError();
        if($err){
            echo '<h2>Error del constructor</h2><pre>'.$err.'</pre>';
            echo '<h2>Request</h2><pre>'.htmlspecialchars($cliente->request, ENT_QUOTES).'</pre>';
            echo '<h2>Response</h2><pre>'.htmlspecialchars($cliente->response, ENT_QUOTES).'</pre>';
            echo '<h2>Debug</h2><pre>'.htmlspecialchars($cliente->getDebug(), ENT_QUOTES).'</pre>';
        }else{
            header("location: ../../views/noticias.php");
            //echo '<h2>Resultado</h2><pre>'; print_r($resultado); echo '</pre>';
        }
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Crear noticia</title>
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
                        <a href="../../views/noticias.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>