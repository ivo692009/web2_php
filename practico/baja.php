<?php

    require __DIR__."/usuario.php";
        
    error_reporting(E_ALL);
    ini_set("display_errors",true);
    
    $baja_id=$_GET["id"];
                
    header('Content-Type: text/html; charset=UTF-8');
    
    try {
        
        $pdo= new PDO('mysql:host=localhost;dbname=clientes_db',$usuario,$contraseña);
        
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("SET NAMES UTF8");
        
        //armamos el SQL
        $sql = "DELETE * FROM clientes WHERE clientes.id = :id";
        
        //preparamos un statement con el sql anterior
        $stmt = $pdo->prepare($sql);
        
        //especificamos la salida como un array
        $stmt->setFetchMode(PDO::FETCH_OBJ);//podria ser PDO::FETCH_OBJ
        
        //sustituimos los parametros con los valores reales
        $stmt->bindParam(':id',$baja_id);
        
        
        //ejecutamos la consulta
        $stmt->execute();
    }
    
    catch(PDOException $e){
        echo 'Error de la coneccion a la BD:' . $e->getMessage();
    }
    
    require __DIR__."/salida.php";