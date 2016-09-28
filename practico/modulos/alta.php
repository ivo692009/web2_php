<?php

session_start();


if($_SESSION['alta'] != TRUE){
        echo 'Usted no tiene permiso para esta operacion';
        ?>
        <html><a href="../vistas/index.php">volver al inicio</a><br><br></html>
        <?php
        die();
}

require __DIR__ . "/usuario.php";

error_reporting(E_ALL);
ini_set("display_errors", true);

//Valores recividos por POST
$nombre_nuevo = $_POST['nombre'];
$apellido_nuevo = $_POST['apellido'];
$fechnac_nuevo = $_POST['date'];
$nacionalidad_id_nuevo = $_POST['nacionalidad_id'];
$estado_nuevo = $_POST['estado'];


header('Content-Type: text/html; charset=UTF-8');

try {

    $pdo = new PDO('mysql:host=localhost;dbname=clientes_db', $usuario, $contraseña);

    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET NAMES UTF8");

    //armamos el SQL
    $sql = "INSERT INTO `clientes` (`apellido`,`nombre`,`activo`,`fechnac`, `nacionalidad_id`) 
            VALUES (:apellido, :nombre, :estado, :fechnac, :nacionalidad_id)";

    //preparamos un statement con el sql anterior
    $stmt = $pdo->prepare($sql);

    //especificamos la salida como un array
    $stmt->setFetchMode(PDO::FETCH_OBJ); //podria ser PDO::FETCH_OBJ
    //sustituimos los parametros con los valores reales
    $stmt->bindParam(':nombre', $nombre_nuevo);
    $stmt->bindParam(':apellido', $apellido_nuevo);
    $stmt->bindParam(':estado', $estado_nuevo);
    $stmt->bindParam(':fechnac', $fechnac_nuevo);
    $stmt->bindParam(':nacionalidad_id', $nacionalidad_id_nuevo);

    //ejecutamos la consulta
    $stmt->execute();
} catch (PDOException $e) {
    echo 'Error de la coneccion a la BD:' . $e->getMessage();
}

require __DIR__ . "/../vistas/salida.php";
