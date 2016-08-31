<?php
    require __DIR__.'/baja_persona.php';
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
                           printf("<th>%s</th>",$p->descripcion);
                           ?>   
                        <?php } ?>
                </table>
    </body>
</html>
