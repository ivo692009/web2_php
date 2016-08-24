<?php
    
    //declarar algunas variables.
    //bibliografia oficial para PHP
    $control        =true;      //para controlar el acceso a la vista.
    //http://localhost/proyecto/listado.php?edad=21&nombre=ivo
    $edad           =(int)$_GET["edad"];
    $nombre         =(String)$_GET["nombre"];
    $esta_lloviendo =false;
    $frutas         =["Peras","Manzanas","Bananas"];  //Array("peras",..);
    
    //include                                  //=> warrning
    require __DIR__.'/vista/listado_vista.php';//=> fatal error
    