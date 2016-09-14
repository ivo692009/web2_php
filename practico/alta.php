<?php
require __DIR__ . "/modulos/usuario.php";

error_reporting(E_ALL);
ini_set("display_errors", true);

//Valores recividos por POST
$username = $_POST['username'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];

if (($username == null) || ($password1 == null || $password2 == null) || ($password1 != $password2)) {
    echo 'Datos invalidos';
    header("Location : index.php");
    ?>
    <html><a href="login_alta.php">volver</a><br><br></html>
    <?php
    die();
}


header('Content-Type: text/html; charset=UTF-8');

try {

    $pdo = new PDO('mysql:host=localhost;dbname=clientes_db', $usuario, $contraseña);

    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET NAMES UTF8");

    //armamos el SQL
    $sql = "INSERT INTO `ussers` (`usu`,`con`) 
            VALUES (:u, :c)";

    //preparamos un statement con el sql anterior
    $stmt = $pdo->prepare($sql);

    //especificamos la salida como un array
    $stmt->setFetchMode(PDO::FETCH_OBJ); //podria ser PDO::FETCH_OBJ
    //sustituimos los parametros con los valores reales
    $stmt->bindParam(':u', $username);
    $stmt->bindParam(':c', $password);

    //ejecutamos la consulta
    $stmt->execute();
} catch (PDOException $e) {
    echo 'Error de la coneccion a la BD:' . $e->getMessage();
}

require __DIR__ . "/vistas/index.php";
