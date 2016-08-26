<?php 
    require __DIR__.'/listado_index.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista de usuarios</title>
    </head>
    <body>
        <legend>
            <table>
                <tr>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Edad</th>
                </tr>
                    <?php
                    foreach($results as $p){
                       printf("<tr><th>%s</th><th>%s</th> <th>%d</th>",
                                   $p->apellido,
                                   $p->nombre,
                                   $p->edad); ?>
                       <th><a href="modificacion_vista.php">Modificar</a></th>
                       <th><a href="baja_vista.php">Baja</a></th></tr><br/>
                    <?php } ?>
            </table>
            <br/><br/>
            <a href="alta_vista.php">Alta Nuevo<br/>
        </legend>
    </body>
</html>
