<?php
require __DIR__ . '/../modulos/nacionalidades.php';

if($_SESSION['loggedin'] == false){
        echo 'Usted no esta Logeado';
        ?>
        <html><a href="../index.php">volver al inicio</a><br><br></html>
        <?php
        die();
}
if($_SESSION['alta'] != TRUE){
        echo 'Usted no tiene permiso para esta operacion';
        ?>
        <html><a href="index.php">volver al inicio</a><br><br></html>
        <?php
        die();
}

$alta = true;
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alta de usuario</title>
    </head>
    <body>
        <form  action="../modulos/alta.php" method="POST">    
            <fieldset>
                <legend>Formulario</legend>
                <h1>Nombre:<input type="text" name="nombre" id="nombre"/> </h1>
                <h1>Apellido: <input type="text" name="apellido" id="apellido"</h1>
                <h1>Fecha de Nacimiento:<input type="date" name="date" id="date"/></h1>
                <h1>Nacionalidad: </h1> 
                <select name="nacionalidad_id"> 
                    <?php foreach ($n as $n1): ?>
                        <option id="nacionalidad_id" value="<?php printf("%s", $n1->id); ?>"> <?php printf("%s", $n1->descripcion); ?> </option>
                    <?php endforeach; ?>
                </select>
                <h1>Estado: </h1> 
                <select name="estado">
                    <option id="estado" value="1">Activo</option>
                    <option id="estado" value="0">Innactivo</option>
                </select>
                <input type="submit" name="Alta"/>
            </fieldset>
        </form>
    </body>
</html>

