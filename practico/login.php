<?php

session_start();
?>

<?php

$username = $_POST['username'];
$password = $_POST['password'];

$host_db = 'localhost';
$user_db = 'clientes_app';
$pass_db = 'WmDX33WdF83r7pPj';
$db_name = 'clientes_db';

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
    die("La conexion falló: " . $conexion->connect_error);
}


$sql = "SELECT * FROM ussers WHERE usu = '$username'";

$result = $conexion->query($sql);

/*
if ($result->num_rows > 0) {
    
}
 */

$row = $result->fetch_array(MYSQLI_ASSOC);


if ($password == $row['con']) {

    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

    
    echo"<script type=\"text/javascript\">alert('Bienvenido'); window.location='../vistas/index.php';</script>"; 
    }   
    else {
        
    echo"<script type=\"text/javascript\">alert('Usuario o contraseña Incorrecta'); window.location='../index.php';</script>"; 
    
}
mysqli_close($conexion);

