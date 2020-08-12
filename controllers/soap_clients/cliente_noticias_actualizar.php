<?php
require_once('lib/nusoap.php');
// Define variables and initialize with empty values
$id = $titulo = $fecha = $cuerpo = $nombre_foto="";
$id_err = $titulo_err = $fecha_err = $cuerpo_err = $nombre_foto_err ="";

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
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
	
	// Validate cuerpo de la noticia
    $input_cuerpo = trim($_POST["cuerpo"]);
    if(empty($input_cuerpo)){
        $cuerpo_err = "Ingresa el cuerpo de la noticia.";
    }else{
        $cuerpo = $input_cuerpo;
    }

    $tmpfile = $_FILES["foto"]["tmp_name"];   // temp filename
    $filename = $_FILES["foto"]["name"];      // Original filename

    $handle = fopen($tmpfile, "r");                  // Open the temp file
    $contents = fread($handle, filesize($tmpfile));  // Read the temp file
    fclose($handle);                                 // Close the temp file
    $decodeContent   = base64_encode($contents);     // Decode the file content, so that we code send a binary string to SOAP


    
    // Check input errors before inserting in database
    if(empty($id_err) && empty($titulo_err) && empty($fecha_err) && empty($cuerpo_err)){
    	$cliente = new nusoap_client("http://localhost/BOMV/controllers/ws_soap/ws_noticias.php");
		//BOMV/controllers/ws_soap/ws_noticias
		$datos = array('id' => $_POST["id"], 'titulo' => $_POST["titulo"], 'fecha' => $_POST["fecha"], 'cuerpo' => $_POST["cuerpo"], 'foto' => $decodeContent, 'nombre_foto' => $filename);

		$resultado = $cliente->call('editarNoticia', $datos);
		
		$err = $cliente->getError();
		/*if($err){
			echo '<h2>Error del constructor</h2><pre>'.$err.'</pre>';
			echo '<h2>Request</h2><pre>'.htmlspecialchars($cliente->request, ENT_QUOTES).'</pre>';
			echo '<h2>Response</h2><pre>'.htmlspecialchars($cliente->response, ENT_QUOTES).'</pre>';
			echo '<h2>Debug</h2><pre>'.htmlspecialchars($cliente->getDebug(), ENT_QUOTES).'</pre>';
		}else{*/
			header("location: ../../views/admin/noticias.php");
		//}
    }
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
		$cliente2 = new nusoap_client("http://localhost/BOMV/controllers/ws_soap/ws_noticias.php");

        $datos = array('id' => $id);

		$resultado = $cliente2->call('buscarNoticia', $datos);
        $array = unserialize($resultado);
        //print_r($array);
        $json = json_encode($array);
        $obj = json_decode($json);
		$err = $cliente2->getError();
		if($err){
			echo '<h2>Error del constructor</h2><pre>'.$err.'</pre>';
			echo '<h2>Request</h2><pre>'.htmlspecialchars($cliente2->request, ENT_QUOTES).'</pre>';
			echo '<h2>Response</h2><pre>'.htmlspecialchars($cliente2->response, ENT_QUOTES).'</pre>';
			echo '<h2>Debug</h2><pre>'.htmlspecialchars($cliente2->getDebug(), ENT_QUOTES).'</pre>';
        }
        else
        {
            $titulo = $obj->titulo;
            $fecha = $obj->fecha;
            $cuerpo = $obj->cuerpo;
            $nombre_foto = $obj->nombre_foto;
		}
        
    }  else{    
        // URL doesn't contain valid id. Redirect to error page
        header("location: ../error.php");
        exit();
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Actualizar noticia</title>
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
                        <h2>Actualizar noticia</h2>
                    </div>
                    <p>Porfavor edita los campos y haz clic en enviar para actualizar la noticia.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" enctype="multipart/form-data">
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
                        <div class="form-group">
                            <img src="http://localhost/BOMV/resources/images/noticias/<?php echo $nombre_foto; ?>" class="img-fluid" alt="Imagen">
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" name="foto" class="form-control" value="http://localhost/BOMV/resources/images/noticias/<?php echo $nombre_foto; ?>" multiple> 
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Agregar">
                        <a href="../../views/admin/noticias.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>