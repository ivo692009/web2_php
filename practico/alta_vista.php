<?php 
 $localidades = ["Rawson","Trelew","Gaiman"];
if(!isset($control_v)):
    echo "deja de flashear wacho";
    endif; 
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Alta de usuario</title>
    </head>
    <body>
        <form action="alta.php" method="POST">    
            <fieldset>
                <legend>Formulario</legend>
                <h1>Nombre: </h1> <input type="text" name="nombre" id="nombre"/>
                <h1>Apellido: <input type="text" name="apellido" id="apellido"</h1>
                <h1>Edad: </h1> <input type="number" name="edad" id="edad"/>
                <h1>Localidad: </h1> 
                <select name="localidad"> 
                    <?php foreach ($localidades as $localidad):?>
                    <option id="localidad" value="<?php echo $localidad; ?>"> <?php echo $localidad ?> </option>
                    <?php endforeach; ?>
                </select>
                <input type="submit" name="Alta"/>
            </fieldset>
        </form>
    </body>
</html>

