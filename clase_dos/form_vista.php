<?php 
 $localidades = ["Rawson","Trelew","Gaiman"];
if(!isset($control1)):
    echo "deja de flashear wacho";
    endif; 
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>La entrada al formulario</title>
    </head>
    <body>
        <form action="proceso.php" method="POST">
            <fieldset>
                <?php
                if(isset($errores)){
                     foreach ($errores as $item): 
                        echo $item;
                     endforeach;
                }
                ?>
            </fieldset>
                
            <fieldset>
                <legend>Formulario</legend>
                <h1>Nombre: </h1> <input type="text" name="nombre" id="nombre"/>
                <h1>Edad: </h1> <input type="number" name="edad" id="edad"/>
                <h1>Localidad: </h1> 
                <select name="localidad"> 
                    <?php foreach ($localidades as $localidad):?>
                    <option id="localidad" value="<?php echo $localidad; ?>"> <?php echo $localidad ?> </option>
                    <?php endforeach; ?>
                </select>
                <input type="submit" name="enviar">Enviar</input>
            </fieldset>
        </form>
    </body>
</html>
