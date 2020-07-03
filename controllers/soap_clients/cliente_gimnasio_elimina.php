<?php
	require_once('lib/nusoap.php');
	
	$cliente = new nusoap_client("http://localhost/box_nusoap/ws_gimnasio.php");
	
	$id = '1';

	$datos = array('id' => $id);

	$resultado = $cliente->call('eliminarGimnasio', $datos);
	
	$err = $cliente->getError();
	if($err){
		echo '<h2>Error del constructor</h2><pre>'.$err.'</pre>';
		echo '<h2>Request</h2><pre>'.htmlspecialchars($cliente->request, ENT_QUOTES).'</pre>';
		echo '<h2>Response</h2><pre>'.htmlspecialchars($cliente->response, ENT_QUOTES).'</pre>';
		echo '<h2>Debug</h2><pre>'.htmlspecialchars($cliente->getDebug(), ENT_QUOTES).'</pre>';
	}else{
		echo '<h2>Resultado</h2><pre>'; print_r($resultado); echo '</pre>';
	}
?>