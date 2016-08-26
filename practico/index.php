<?php 
    require __DIR__.'/listado_index.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista de usuarios</title>
    </head>
    <body>
        <fieldset>
            <legend>
                <a href="alta_vista.php">Alta Nuevo</a><br/>
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
                        foreach($results as $p){
                           printf("<tr><th>%s</th><th>%s</th><th>%s</th>",
                                       $p->nombre,
                                       $p->apellido,
                                       $p->fechnac
                                       );
                           if($p->activo == 1){
                               printf("<th>Activo</th>");
                           }
                           else{
                               printf("<th>Inactivo</th>");
                           }
                           printf("<th>%s</th>",$p->nacionalidad);
                           ?>
                           
                           <th><a href="modificacion_vista.php">Modificar</a></th>
                           <th><a href="baja_vista.php">Baja</a></th></tr><br/>
                        <?php } ?>
                </table>
            </legend>
        </fieldset>
    </body>
</html>
