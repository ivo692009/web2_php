<?php

if(!isset($_SESSION['username'])){
        echo 'Usted no esta Logeado';
        ?>
        <html><a href="../index.php">volver al inicio</a><br><br></html>
        <?php
        die();
}

if($_SESSION['baja'] != TRUE){
        echo 'Usted no tiene permiso para esta operacion';
        ?>
        <html><a href="../vistas/index.php">volver al inicio</a><br><br></html>
        <?php
        die();
}

require __DIR__ . '/usuario.php';
error_reporting(E_ALL);
ini_set("display_errors", true);
header('Content-Type: text/html; charset=UTF-8');

//ID recivida por GET
$b_id = $_GET["id"];

try {

    //Coneccion a la base de datos
    $pdo = new PDO('mysql:host=localhost;dbname=clientes_db', $usuario, $contraseña);

    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET NAMES UTF8");

    //armamos el SQL
    $sql = "SELECT clientes.id, clientes.nombre, clientes.apellido, clientes.activo, clientes.fechnac, nacionalidades.descripcion "
            . " FROM clientes "
            . "JOIN nacionalidades ON clientes.nacionalidad_id=nacionalidades.id "
            . "WHERE clientes.id=:id";

    //preparamos un statement con el sql anterior
    $stmt = $pdo->prepare($sql);

    //especificamos la salida como un array
    $stmt->setFetchMode(PDO::FETCH_OBJ); //podria ser PDO::FETCH_OBJ
    //Asigamos valores a los parametros
    $stmt->bindParam(':id', $b_id);

    //ejecutamos la consulta
    $stmt->execute();

    //recuperamos los datos en el array asoc.
    $results = $stmt->fetchAll();
} catch (PDOException $e) {
    echo 'Error de la coneccion a la BD:' . $e->getMessage();
}
