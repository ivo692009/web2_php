<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Salida de lo que viene de bases de datos</title>
    </head>
    <body>
    <legend>
        <?php
        foreach ($results as $fila) {
            printf("%s %s (%d años) <br/>", $fila->apellido, $fila->nombre, $fila->edad);
            var_dump($fila);
        }
        ?>
    </legend>

</body>
</html>
