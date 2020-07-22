<?php
    require_once('lib/nusoap.php');

    $id_juez = $_POST["id_juez"];
    $id_pelea = $_POST["id_pelea"];;
    $id_boxeador = $_POST["id_boxeador"]; 
    $round1 = $_POST["round1"];
    $round2 = $_POST["round2"];
    $round3 = $_POST["round3"];
    $round4 = $_POST["round4"];
    $round5 = $_POST["round5"];
    $round6 = $_POST["round6"];
    $round7 = $_POST["round7"];
    $round8 = $_POST["round8"];
    $round9 = $_POST["round9"];
    $round10 = $_POST["round10"];
    $round11 = $_POST["round11"];
    $round12 = $_POST["round12"];
    $total_puntos = $_POST["total_puntos"];
    $num_jabs = $_POST["num_jabs"];
    $num_power = $_POST["num_power"];
    $total_golpes = $_POST["total_golpes"];
    $ganador = $_POST["ganador"];
        // Check input errors before inserting in database
        if(empty($id_juez) && empty($id_pelea) && empty($id_boxeador) && empty($round1) && empty($round2) && empty($round3) && empty($round4) && empty($round5) && empty($round6) && empty($round7) && empty($round8) && empty($round9) && empty($round10) && empty($roun11) && empty($roun12) && empty($total_puntos) && empty($num_jabs) && empty($num_power) && empty($total_golpes) && empty($ganador)){
            header("location: ../error.php");
        }
        else
        {
            $cliente = new nusoap_client("http://localhost/BOMV/ws_soap/ws_gimnasio.php");
    
            $datos = array('id_juez' => $id_juez, 
                           'id_pelea' => $id_pelea, 
                           'id_boxeador' => $id_boxeador, 
                           'round1' => $round1, 
                           'round2' => $round2,
                           'round3' => $round3,
                           'round4' => $round4,
                           'round5' => $round5,
                           'round6' => $round6,
                           'round7' => $round7,
                           'round8' => $round8,
                           'round9' => $round9,
                           'round10' => $round10,
                           'round11' => $round11,
                           'round12' => $round12,
                           'total_puntos' => $total_puntos,
                           'num_jabs' => $num_jabs,
                           'num_power' => $num_power,
                           'total_golpes' => $total_golpes,
                           'ganador' => $ganador
                            );
    
            $resultado = $cliente->call('agregarTablaPelea', $datos);
            
            $err = $cliente->getError();
            if($err)
            {
                echo '<h2>Error del constructor</h2><pre>'.$err.'</pre>';
                echo '<h2>Request</h2><pre>'.htmlspecialchars($cliente->request, ENT_QUOTES).'</pre>';
                echo '<h2>Response</h2><pre>'.htmlspecialchars($cliente->response, ENT_QUOTES).'</pre>';
                echo '<h2>Debug</h2><pre>'.htmlspecialchars($cliente->getDebug(), ENT_QUOTES).'</pre>';
            }else{
                header("location: ../../views/tablas_peleas.php");
                //echo '<h2>Resultado</h2><pre>'; print_r($resultado); echo '</pre>';
            }
        }
?>