<?php

include_once 'conn.php';

$obj = new conn();
$conectar = $obj->Conectar();

$_POST = json_decode(file_get_contents("php://input"), true);

$method = (isset($_POST['opt'])) ? $_POST['opt'] : '';

$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$marca = (isset($_POST['marca'])) ? $_POST['marca'] : '';
$modelo = (isset($_POST['modelo'])) ? $_POST['modelo'] : '';
$estoque = (isset($_POST['estoque'])) ? $_POST['estoque'] : '';

switch ($method) {
    case 1:
        $query = "INSERT INTO celulares (marca, modelo, estoque) VALUES ('$marca','$modelo','$estoque')";
        $result = $conectar->prepare($query);
        $result->execute();
        break;
    case 2:
        $query = "UPDATE celulares SET marca='$marca', modelo='$modelo', estoque='$estoque' WHERE id ='$id'";
        $result = $conectar->prepare($query);
        $result->execute();
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:
        $query = "DELETE FROM celulares WHERE id='$id'";
        $result = $conectar->prepare($query);
        $result->execute();
        break;
    case 4:
        $query = "SELECT * FROM celulares";
        $result = $conectar->prepare($query);
        $result->execute();
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        break;

    case 5:
        $query = "SELECT * FROM celulares WHERE id='$id'";
        $result = $conectar->prepare($query);
        $result->execute();
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        break;
}  

print json_encode($data, JSON_UNESCAPED_UNICODE);
$conectar = NULL;