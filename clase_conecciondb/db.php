<?php

    require __DIR__."/usuario.php";
        
    error_reporting(E_ALL);
    ini_set("display_errors",true);
    $edad_cliente = $_GET['edad'];
    header('Content-Type: text/html; charset=UTF-8');
    
    try {
        
        $pdo= new PDO('mysql:host=localhost;dbname=clientes_db',$usuario,$contraseña);
        
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("SET NAMES UTF8");
        
        //armamos el SQL
        $sql = "SELECT apellido, nombre, edad FROM clientes WHERE edad >= :edad";
        
        //preparamos un statement con el sql anterior
        $stmt = $pdo->prepare($sql);
        
        //especificamos la salida como un array
        $stmt->setFetchMode(PDO::FETCH_OBJ);//podria ser PDO::FETCH_OBJ
        
        //sustituimos los parametros con los valores reales
        $stmt->bindParam(':edad',$edad_cliente);
        
        //ejecutamos la consulta
        $stmt->execute();
        
        //recuperamos los datos en el array asoc.
        $results = $stmt->fetchAll();
      
    }
    
    catch(PDOException $e){
        echo 'Error de la coneccion a la BD:' . $e->getMessage();
    }
    printf("<h1>Clientes regisrados mayores de %d años </h1>",$edad_cliente);
    
    //mostramos los datos(ej.en un template)
    
    require __DIR__."/salida.php";