<?php

$control2=true;
$r_nombre= $_POST['nombre'];
$r_edad=$_POST['edad'];
$r_localidad=$_POST['localidad'];
$errores=[];

if(empty($r_nombre)||  strlen($r_nombre)==0){
    $errores["Nombre"] = "Nombre invalido";
}
if($r_edad >101 || $r_edad <= 0){
    $errores["Edad"] = "Edad ingresada no valida";
}
if(empty($errores)){
    
    require __DIR__.'/proceso_vista.php';
}
else{
    require __DIR__.'/form_vista.php';
}

