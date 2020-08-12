<?php
    require ('conexion.php');
    
    session_start();
   
    if(!empty($_POST)){
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];
        $sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND password='$contrasena'";
        
        $result = mysqli_query($conexion, $sql);
        if(mysqli_query($conexion, $sql)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    $iddom = $didmed['0']; 
                    echo "<script>console.log('Sesion de: " . $iddom . "' );</script>";
                    if ($row['cargo'] == 'Administrador'){
                        $_SESSION['usuario'] = $usuario;
                        header("Location: ../views/admin/noticias.php");
                    } else if ($row['cargo'] == 'Usuario'){
                        $_SESSION['usuario'] = $usuario;
                        header("Location: ../views/users/noticias.php");
                    }
                }
            }else{
                die(header("Location:../index.php?loginFailed=true&reason=password"));
                
            } 
        } else {
            die(header("Location:../index.php?loginFailed=true&reason=errorconexion"));
            
        }
         
    }
?>