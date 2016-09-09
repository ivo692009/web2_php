<?php
    require __DIR__.'../modulos/nacionalidades.php';
    $alta = true;
?>
<script>function formulario(f) {
if (f.nombre.value   == '') { alert ('El nombre esta vacío'); 
f.nombre.focus(); return false; }
if (f.apeliido.value   == '') { alert ('El apellido esta vacío'); 
f.apellido.focus(); return false; }
if (f.date.value   == '') { alert ('Fecha no asignada'); 
f.date.focus(); return false; }
</script>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Alta de usuario</title>
    </head>
    <body>
        <form onsubmit="return formulario(this)" action="../modulos/alta.php" method="POST">    
            <fieldset>
                <legend>Formulario</legend>
                <h1>Nombre:<input type="text" name="nombre" id="nombre"/> </h1>
                <h1>Apellido: <input type="text" name="apellido" id="apellido"</h1>
                <h1>Fecha de Nacimiento:<input type="date" name="date" id="date"/></h1>
                <h1>Nacionalidad: </h1> 
                <select name="nacionalidad_id"> 
                    <?php foreach ($n as $n1):?>
                    <option id="nacionalidad_id" value="<?php printf("%s",$n1->id); ?>"> <?php printf("%s",$n1->descripcion); ?> </option>
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

