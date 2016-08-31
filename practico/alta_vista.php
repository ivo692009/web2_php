<?php 
 $n = ["Argentino","Chileno","Paraguayo"];
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
                <h1>Fecha de Nacimiento: </h1> <input type="date" name="date" id="date"/>
                <h1>Nacionalidad: </h1> 
                <select name="nacionalidad"> 
                    <?php foreach ($n as $n1):?>
                    <option id="localidad" value="<?php echo $n1; ?>"> <?php echo $n1 ?> </option>
                    <?php endforeach; ?>
                </select>
                <h1>Estado: </h1> 
                <select name="estado">
                    <option id="estado" value="1">Activo</option>
                    <option id="estado" value="0">Innactivo</option>
                </select>
                <input type="submit" name="Alta"/>
            </fieldset>
        </form>
    </body>
</html>

