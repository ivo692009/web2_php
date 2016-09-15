<?php

require __DIR__ . '/listado_index.php';
$id = 0;
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista de usuarios</title>
    </head>
    <body>
        <fieldset>
            <legend>
                <br/><br/>
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
                        } ?>
                </table>
                <a href="../index.php">Volver a la pagina de inicio</a>
            </legend>
        </fieldset>
    </body>
</html>