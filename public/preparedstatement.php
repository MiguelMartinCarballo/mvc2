<?php

$dsn = "mysql:dbname=demo;host=db";
$usuario = "dbuser";
$password = "secret";

/**
 * 1- preparar la consulta -> prepare
 * 2- vincular los datos -> bindParam / bindValue
 * 3- ejecutar la sentencia -> execute(); (query, exec)
 */

try {
    $db = new PDO($dsn, $usuario, $password);
    //establece el nivel de error que se muestra en la conexión
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //preparacion por nombre
    $sentencia = $db->prepare("INSERT INTO credenciales (nombreusu,password) VALUES (:nombre,:clave)");
    
    
    //preparacion por posicion
    //$sentencia = $db->prepare("INSERT INTO credenciales (nombreusu,password) VALUES (?, ?)");
    
    $nombre = "Juan";
    $clave1 = "1234";

    //asigna apuntador a la variable, si se cambia despues, tambien cambia el parametro (Pedro y 789)
    $sentencia->bindParam(":nombre", $nombre);
    $sentencia->bindParam(":clave", $clave1);

    //si parametros son números
    //$sentencia->bindParam(1, $nombre);
    //$sentencia->bindParam(2, $clave1);

    //asigna directamente el valor (Juan y 1234)
    //$sentencia->bindValue(":nombre", $nombre);
    //$sentencia->bindValue(":clave", $clave1);

    //ejemplo para comprobar comportamiento
    $nombre = "Pedro";
    $clave1 = "789";

    $sentencia->execute();

    echo "<h2>Exito</h2>";
} catch (PDOException $e){
    echo "Error producido al conectar: " . $e->getMessage();
}