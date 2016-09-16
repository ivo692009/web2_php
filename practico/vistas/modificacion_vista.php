<?php

if($_SESSION['loggedin'] == false){
        echo 'Usted no esta Logeado';
        ?>
        <html><a href="../index.php">volver al inicio</a><br><br></html>
        <?php
        die();
}

if($_SESSION['modificacion'] != TRUE){
        echo 'Usted no tiene permiso para esta operacion';
        ?>
        <html><a href="index.php">volver al inicio</a><br><br></html>
        <?php
        die();
}

require __DIR__ . '/../modulos/baja_persona.php';
require __DIR__ . '/../modulos/nacionalidades.php';
$modificacion = true;
?>

<script>function formulario(f) {
        if (f.nombre.value == '') {
            alert('El nombre esta vacío');
            f.nombre.focus();
            return false;
        }
        if (f.apeliido.value == '') {
            alert('El apellido esta vacío');
            f.apellido.focus();
            return false;
        }
        if (f.date.value == '') {
            alert('Fecha no asignada');
            f.date.focus();
            return false;
        }
</script>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form onsubmit="return formulario(this)" action="../modulos/modificacion.php" method="POST">   
            <h1>La persona Seleccionada es</h1>
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Estado</th>
                    <th>Nacionalidad</th>
                </tr>
                <?php
                foreach ($results as $p) {
                    printf("<tr><th>%s</th><th>%s</th><th>%s</th>", $p->nombre, $p->apellido, $p->fechnac
                    );
                    if ($p->activo == 1) {
                        printf("<th>Activo</th>");
                    } else {
                        printf("<th>Inactivo</th>");
                    }
                    printf("<th>%s</th>", $p->descripcion);
                    ?>   
                <?php } ?>    
                <fieldset>
                    <legend>Formulario</legend>
                    <h1>Nombre:<input type="text" name="nombre" id="nombre"/></h1>
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
                        <option id="estado" value="0">Inactivo</option>
                    </select>
                    <input type="hidden" name="id" value="<?php printf("%s", $p->id); ?>"/>
                    <input type="submit" name="Modificacion"/>
                </fieldset>
        </form>           
    </table>
</body>
</html>