<?php
    /* Código tomado de: https://www.codigonaranja.com/2018/crear-restful-web-service-php */
    include "config.php";
    include "utils.php";
    
    $dbConn =  connect($db);
    
    // ***** SERVICIO GET (Leer) *****
    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
      if (isset($_GET['id'])) {
    
        //Mostrar un post
        $sql = $dbConn->prepare("SELECT * FROM posiciones_generales_municipales where id=:id");
        $sql->bindValue(':id', $_GET['id']);
        $sql->execute();
        header("HTTP/1.1 200 OK");
        echo json_encode($sql->fetch(PDO::FETCH_ASSOC));
        exit();
      } else {
    
        //Mostrar lista de post
        $sql = $dbConn->prepare("SELECT * FROM posiciones_generales_municipales ORDER BY peleas_ganadas DESC, peleas_perdidas ASC, empates DESC");
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        header("HTTP/1.1 200 OK");
        echo json_encode($sql->fetchAll());
        exit();
      }
    }
    
    // ***** SERVICIO POST (Crear) *****
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      $input = $_POST;
      
      $sql = "INSERT INTO posiciones_generales_municipales
      (alias_boxeador, gimnasio, categoria, division, peleas_ganadas, peleas_perdidas, empates)
      VALUES
      (:alias_boxeador, :gimnasio, :categoria, :division, :peleas_ganadas, :peleas_perdidas, :empates)";
      
      $statement = $dbConn->prepare($sql);
      bindAllValues($statement, $input);
      $statement->execute();
    
      $postId = $dbConn->lastInsertId();
      if($postId){
        $input['id'] = $postId;
        header("HTTP/1.1 200 OK");
        echo json_encode($input);
        exit();
      }
    }
    
    // ***** SERVICIO DELETE (Borrar) *****
    if ($_SERVER['REQUEST_METHOD'] == 'DELETE'){
      $id = $_GET['id'];
      $statement = $dbConn->prepare("DELETE FROM posiciones_generales_municipales where id=:id");
      $statement->bindValue(':id', $id);
      $statement->execute();
      header("HTTP/1.1 200 OK");
      exit();
    }
    
    // ***** SERVICIO PUT (Actualizar) *****
    if ($_SERVER['REQUEST_METHOD'] == 'PUT'){
      $input = $_GET;
      $postId = $input['id'];
      $fields = getParams($input);
    
      $sql = "UPDATE posiciones_generales_municipales SET $fields WHERE id='$postId'";
      $statement = $dbConn->prepare($sql);
      bindAllValues($statement, $input);
      $statement->execute();
      
      header("HTTP/1.1 200 OK");
      exit();
    }
    
    //En caso de que ninguna de las opciones anteriores se haya ejecutado
    header("HTTP/1.1 400 Bad Request");
?>