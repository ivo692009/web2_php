<?php

session_start();
?>

<?php

error_reporting(E_ALL);
ini_set("display_errors", true);

header('Content-Type: text/html; charset=UTF-8');

$username = $_POST['username'];
$password = $_POST['password'];
$permiso = $_POST['permiso'];

try {

    $pdo = new PDO('mysql:host=localhost;dbname=clientes_db', $usuario, $contraseña);

    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET NAMES UTF8");

    //armamos el SQL
    $sql = "SELECT * FROM ussers WHERE usu = '$username'";

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
    //recuperamos los datos en el array asoc.
    $results = $stmt->fetchAll();
} catch (PDOException $e) {
    echo 'Error de la coneccion a la BD:' . $e->getMessage();
} finally {
    //Verificar usuario y contraseña

    foreach ($results as $r) {
        if ($r->con == $password && $r->usu == $username) {

            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
            if($permiso==1){
                $_SESSION['alta']=true;
            }
            if($permiso==2){
                $_SESSION['baja']=true;
            }
            if($permiso==3){
                $_SESSION['modificacion']=true;
            }

            echo"<script type=\"text/javascript\">alert('Bienvenido'); window.location='../vistas/index.php';</script>";
        } else {
            echo"<script type=\"text/javascript\">alert('Usuario o contraseña Incorrecta'); window.location='../index.php';</script>";
        }
    }
}