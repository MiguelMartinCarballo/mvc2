<?php

class Login {
    protected $nombreusu = null; //se debe llamar igual que la columana
    protected $password = null;

    // recuperar filas:
    /**
     *  1- preparar la consulta -> prepare
     *  2- establecer el modo de recuperación: FERCH_CLASS, FETCH_ASS
     *  3- ejecutar la consulta -> execute
     *  4- Recuperar los registros: fetch (un registro) / fetchAll (devuelve todos los registros)
     */

    public static function all(){
        $dsn = "mysql:host=db;dbname=demo";
        $usuario = "dbuser";
        $password = "secret";

        try {
            $db = new PDO($dsn, $usuario, $password);

            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM credenciales";
            $sentencia = $db->prepare($sql);

            // establece la forma de recuperar registros
            $sentencia->setFetchMode(PDO::FETCH_CLASS, "Login");

            $sentencia->execute();

            /*
            while($obj = $sentencia->fetch()){
                //print_r($obj);
                echo "<br>Nombre: " . $obj->nombreusu;
                echo "<br>Contraseña : " . $obj->password;
            }
            */

            $credenciales = $sentencia->fetchAll(PDO::FETCH_CLASS, "Login");
            foreach($credenciales as $credencial){
                echo "<br>NOMBRE: " . $credencial->nombreusu;
                echo "<br>CONTRASEÑA: " . $credencial->password;
            }
        } catch (PDOException $e) {
            echo "<br>Error conexion: " . $e->getMessage();
        }
    }
}

echo "<h2>Recuperando registros</h2>";
Login::all();