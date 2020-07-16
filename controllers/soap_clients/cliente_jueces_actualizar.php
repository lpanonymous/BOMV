<?php
require_once('lib/nusoap.php');
// Define variables and initialize with empty values
    $id = 
    $nombre = 
    $usuario = 
    $contrasena = 
    $foto ="";

    $id_err = 
    $nombre_err = 
    $usuario_err = 
    $contrasena_err = 
    $foto_err = "";
 
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
        // Get hidden input value
        $id = $_POST["id"];
    
        $input_nombre = trim($_POST["nombre"]);
		if(empty($input_nombre)){
			$nombre_err = "Porfavor ingresa un nombre de juez.";
		} 
		else{
			$nombre = $input_nombre;
        }
        
        $input_usuario = trim($_POST["usuario"]);
		if(empty($input_usuario)){
			$usuario_err = "Porfavor ingresa un nombre de usuario.";
		} 
		else{
			$usuario = $input_usuario;
        }
        
        $input_contrasena = trim($_POST["contrasena"]);
		if(empty($input_contrasena)){
			$contrasena_err = "Porfavor ingresa una contraseña.";
		} 
		else{
			$contrasena = $input_contrasena;
        }
        
        $input_foto = trim($_POST["foto"]);
		if(empty($input_foto)){
			$foto_err = "Porfavor ingresa una foto.";
		} 
		else{
			$foto = $input_foto;
        }
    
    // Check input errors before inserting in database
    if(empty($id_err) && empty($nombre_err) && empty($usuario_err) && empty($contrasena_err) && empty($foto_err)){
        $cliente = new nusoap_client("http://localhost/BOMV/ws_soap/ws_gimnasio.php");

		$datos = array('id' => $_POST["id"], 
                           'nombre' => $_POST["nombre"], 
                           'usuario' => $_POST["usuario"], 
                           'contrasena' => $_POST["contrasena"], 
                           'foto' => $_POST["foto"]
                            );

		$resultado = $cliente->call('editarJuez', $datos);
		
		$err = $cliente->getError();
		if($err){
			echo '<h2>Error del constructor</h2><pre>'.$err.'</pre>';
			echo '<h2>Request</h2><pre>'.htmlspecialchars($cliente->request, ENT_QUOTES).'</pre>';
			echo '<h2>Response</h2><pre>'.htmlspecialchars($cliente->response, ENT_QUOTES).'</pre>';
			echo '<h2>Debug</h2><pre>'.htmlspecialchars($cliente->getDebug(), ENT_QUOTES).'</pre>';
		}else{
			header("location: ../../views/jueces.php");
		}
    }
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        $cliente2 = new nusoap_client("http://localhost/BOMV/ws_soap/ws_gimnasio.php");

        $datos = array('id' => $id);

		$resultado = $cliente2->call('buscarJuez', $datos);
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
            $nombre = $obj->nombre;
            $usuario = $obj->usuario;
            $contrasena = $obj->contrasena;
            $foto = $obj->foto;
		}
        
    }  
    else{    
        // URL doesn't contain valid id. Redirect to error page
        header("location: ../error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Actualizar juez</title>
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
                        <h2>Actualizar juez</h2>
                    </div>
                    <p>Porfavor ingresa los datos y luego da clic en actualizar juez.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($nombre_err)) ? 'has-error' : ''; ?>">
                            <label>Nombre</label>
                            <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>">
                            <span class="help-block"><?php echo $nombre_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($usuario_err)) ? 'has-error' : ''; ?>">
                            <label>Usuario</label>
                            <input type="text" name="usuario" class="form-control" value="<?php echo $usuario; ?>">
                            <span class="help-block"><?php echo $usuario_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($contrasena_err)) ? 'has-error' : ''; ?>">
                            <label>Contraseña</label>
                            <input type="password" name="contrasena" class="form-control" value="<?php echo $contrasena; ?>">
                            <span class="help-block"><?php echo $contrasena_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($foto_err)) ? 'has-error' : ''; ?>">
                            <label>Foto</label>
                            <input type="text" name="foto" class="form-control" value="<?php echo $foto; ?>">
                            <span class="help-block"><?php echo $foto_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Actualizar juez">
                        <a href="../../views/jueces.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>