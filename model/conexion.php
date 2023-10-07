<?php

    $servidor = "mysql:dbname=".DATABASE.";host=".SERVIDOR;

    try{
        $pdo = new PDO($servidor, USER, PASSWORD,
             array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8")            
    );

    if ($pdo) {
        echo "Conexión exitosa a la base de datos.";
    } else {
        die("Error al conectar a la base de datos.");
    }
    
   // echo "<script>alert('Conectado...')</script>";
    
    } catch(PDOException $e){
        echo "Error al conectar a la base de datos: " . $e->getMessage();
    }
