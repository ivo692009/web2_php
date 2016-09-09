<?php 
    require __DIR__.'/../modulos/listado_index.php';
    $id=0;
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista de usuarios</title>
    </head>
    <body>
        <fieldset>
            <legend>
                <a href="vistas/alta_vista.php">Alta Nuevo</a><br/>
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
                           printf("<th>%s</th>",$p->descripcion);
                           ?>
                           
                           <th><a href="vistas/modificacion_vista.php?id=<?php echo $p->id ?>" name="id" value="<?php $id=$p->id ?>">Modificar</a></th>
                           <th><a href="vistas/baja_vista.php?id=<?php echo $p->id ?>" name="id" value="<?php $id=$p->id ?>">Baja</a></th></tr><br/>
                        <?php } ?>
                </table>
            </legend>
        </fieldset>
    </body>
</html>