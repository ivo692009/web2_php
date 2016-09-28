<?php

if(!session_start()){
        echo 'Usted no esta Logeado';
        ?>
        <html><a href="../index.php">volver al inicio</a><br><br></html>
        <?php
        die();
}

if($_SESSION['baja'] != TRUE){
        echo 'Usted no tiene permiso para esta operacion';
        ?>
        <html><a href="index.php">volver al inicio</a><br><br></html>
        <?php
        die();
}

require __DIR__ . '/../modulos/baja_persona.php';


?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
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
            <th><a href="../modulos/baja.php?id=<?php printf("%s", $p->id); ?>" name="id">Eliminar</a></th>
            <th><a href="index.php">Volver</a></th></tr><br/>
    </table>
</body>
</html>
