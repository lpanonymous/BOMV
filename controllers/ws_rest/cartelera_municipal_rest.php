<?php
/* Código tomado de: https://www.codigonaranja.com/2018/crear-restful-web-service-php */
include "config.php";
include "utils.php";

$dbConn =  connect($db);

// ***** SERVICIO GET (Leer) *****
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
  if (isset($_GET['id'])) {

    //Mostrar un post
    $sql = $dbConn->prepare("SELECT * FROM peleas_municipales where id=:id");
    $sql->bindValue(':id', $_GET['id']);
    $sql->execute();
    header("HTTP/1.1 200 OK");
    echo json_encode($sql->fetch(PDO::FETCH_ASSOC));
    exit();
  } else {

    //Mostrar lista de post
    $sql = $dbConn->prepare("SELECT * FROM peleas_municipales");
    $sql->execute();
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    header("HTTP/1.1 200 OK");
    echo json_encode($sql->fetchAll());
    exit();
  }
}

//En caso de que ninguna de las opciones anteriores se haya ejecutado
header("HTTP/1.1 400 Bad Request");
?>