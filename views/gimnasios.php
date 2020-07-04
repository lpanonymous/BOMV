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
                        <h2 class="pull-left">Gimnasios</h2>
                        <a href="../controllers/soap_clients/cliente_gimnasio_agregar.php" class="btn btn-success pull-right">Agregar nuevo gimnasio</a>
                    </div>
                    <?php
                        require_once('../ws_soap/lib/nusoap.php');
                        $cliente = new nusoap_client("http://localhost/BOMV/ws_soap/ws_gimnasio.php");
                        $datos = array();
                    
                        $resultado = $cliente->call('mostrarGimnasios', $datos);
                        
                        $err = $cliente->getError();
                        if($err){
                            echo '<h2>Error del constructor</h2><pre>'.$err.'</pre>';
                            echo '<h2>Request</h2><pre>'.htmlspecialchars($cliente->request, ENT_QUOTES).'</pre>';
                            echo '<h2>Response</h2><pre>'.htmlspecialchars($cliente->response, ENT_QUOTES).'</pre>';
                            echo '<h2>Debug</h2><pre>'.htmlspecialchars($cliente->getDebug(), ENT_QUOTES).'</pre>';
                        }
                        else
                        {
                            echo $resultado;
                        }
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>