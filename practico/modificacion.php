<?php

    require __DIR__."/usuario.php";
        
    error_reporting(E_ALL);
    ini_set("display_errors",true);
    $nombre_nuevo= $_POST['nombre'];
    $apellido_nuevo= $_POST['apellido'];
    $fechnac_nuevo=$_POST['date'];
    $nacionalidad_nuevo=$_POST['nacionalidad']; //falta agregar
    $estado_nuevo= $_POST['estado'];
    $id=$_POST['id'];
    $iso;
    
    if($nacionalidad_nuevo=="Argentino"){
      $iso="AR";  
    }elseif($nacionalidad_nuevo=="Chileno"){
      $iso="CL";  
    }elseif($nacionalidad_nuevo=="Paraguayo"){
      $iso="PY";  
    }else{
      $iso="XX";  
    }
    
    header('Content-Type: text/html; charset=UTF-8');
    
    try {
        
        $pdo= new PDO('mysql:host=localhost;dbname=clientes_db',$usuario,$contraseña);
        
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("SET NAMES UTF8");
        
        //armamos el SQL
        $sql = "UPDATE `clientes` SET apellido= :apellido,nombre=:nombre, activo=:estado,fechnac=:fechnac WHERE clientes.id=:id;
                UPDATE `nacionalidades` SET descripcion=:nacionalidad,iso=:iso WHERE nacionalidades.id=:id";
        
        //preparamos un statement con el sql anterior
        $stmt = $pdo->prepare($sql);
        
        //especificamos la salida como un array
        $stmt->setFetchMode(PDO::FETCH_OBJ);//podria ser PDO::FETCH_OBJ
        
        //sustituimos los parametros con los valores reales
        $stmt->bindParam(':nombre',$nombre_nuevo);
        $stmt->bindParam(':apellido',$apellido_nuevo);
        $stmt->bindParam(':estado',$estado_nuevo);
        $stmt->bindParam(':fechnac',$fechnac_nuevo);
        $stmt->bindParam(':nacionalidad',$nacionalidad_nuevo);
        $stmt->bindParam(':iso',$iso);
        $stmt->bindParam(':id',$id);
        
        
        //ejecutamos la consulta
        $stmt->execute();
    }
    
    catch(PDOException $e){
        echo 'Error de la coneccion a la BD:' . $e->getMessage();
    }
    
    require __DIR__."/salida.php";