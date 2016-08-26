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
            <?php
             foreach($personas as $p){
                printf("%s %s (%d años) <br/>",
                            $p->apellido,
                            $p->nombre,
                            $p->edad);
            } ?>
        </legend>
    </body>
</html>
