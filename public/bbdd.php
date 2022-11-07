<?php

require "../bddcon.php";



$sql = "select nombreusu, password from credenciales";
$registros = $db->query($sql);

echo "<br>Numero de registros devueltos: " . $registros->rowCount();
if ($registros->rowCount() > 0) {
    foreach ($registros as $fila) {
        echo "<br>Nombre de usuario: " . $fila["nombreusu"];
        echo "<br>Password: " . $fila["password"];
    }
} else {
    echo "<br>No se ha devuelto ninguna fila";
}