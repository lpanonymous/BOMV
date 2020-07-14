<?php
require_once('lib/nusoap.php');
 
// Define variables and initialize with empty values
$id = $nombre = $usuario = $contrasena = $foto="";
$id_err = $nombre_err = $usuario_err = $contrasena_err = $foto_err ="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate id_juez
    $input_id = trim($_POST["id"]);
    if(empty($input_id)){
        $id_err = "Ingresa el id del juez.";
    } 
    else{
        $id = $input_id;
    }

    // Validate nombre juez
    $input_nombre = trim($_POST["nombre"]);
    if(empty($input_nombre)){
        $nombre_err = "Ingresa el nombre del juez.";
    } 
    else{
        $nombre = $input_nombre;
    }

    // Validate nombre de usuario del juez
    $input_usuario = trim($_POST["usuario"]);
    if(empty($input_usuario)){
        $usuario_err = "Ingresa el nombre de usuario.";
    }else{
        $usuario = $input_usuario;
    }

    // Validate nombre de usuario del juez
    $input_contrasena = trim($_POST["contrasena"]);
    if(empty($input_contrasena)){
        $contrasena_err = "Ingresa la contraseña del usuario.";
    }else{  
        $contrasena = password_hash($input_contrasena, PASSWORD_BCRYPT);
        password_verify($input_contrasena, $contrasena);
    }

    // Validate foto de juez
    $input_foto = trim($_POST["foto"]);
    if(empty($input_foto)){
        $foto_err = "Ingresa la foto del usuario.";
    }else{
        $foto = $input_foto;
    }
    
    // Check input errors before inserting in database
    if(empty($id_err) && empty($nombre_err) && empty($usuario_err) && empty($contrasena_err) && empty($foto_err)){
        $cliente = new nusoap_client("http://localhost/BOMV/ws_soap/ws_gimnasio.php");

        $datos = array('id' => $_POST["id"], 'nombre' => $_POST["nombre"], 'usuario' => $_POST["usuario"], 'contrasena' => $contrasena, 'foto' => $_POST["foto"]);

        $resultado = $cliente->call('agregarJuez', $datos);
        
        $err = $cliente->getError();
        if($err){
            echo '<h2>Error del constructor</h2><pre>'.$err.'</pre>';
            echo '<h2>Request</h2><pre>'.htmlspecialchars($cliente->request, ENT_QUOTES).'</pre>';
            echo '<h2>Response</h2><pre>'.htmlspecialchars($cliente->response, ENT_QUOTES).'</pre>';
            echo '<h2>Debug</h2><pre>'.htmlspecialchars($cliente->getDebug(), ENT_QUOTES).'</pre>';
        }else{
            header("location: ../../views/jueces.php");
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
    <title>Crear juez</title>
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
                        <h2>Crear juez</h2>
                    </div>
                    <p>Porfavor llena el formulario para almacenar al juez en la base de datos.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($id_err)) ? 'has-error' : ''; ?>">
                            <label>Id</label>
                            <input type="text" name="id" class="form-control" value="<?php echo $id; ?>">
                            <span class="help-block"><?php echo $id_err;?></span>
                        </div>
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

                        <input type="submit" class="btn btn-primary" value="Agregar juez">
                        <a href="../../views/jueces.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>