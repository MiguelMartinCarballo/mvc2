<?php

//mysql:dbname=<nombre_bbdd>;host=<ip | nombre>;

$dsn = "mysql:dbname=demo;host=db";
$usuario = "dbuser";
$clave = "secret";

try {
    $db = new PDO($dsn, $usuario, $clave);
} catch(PDOException $e) {
    echo "Mensaje de la excepción: " . $e->getMessage();
}