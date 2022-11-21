<?php
// Fichero que simula el modelo con datos

//namespace App\Models;

use PDO;
use Core\Model;
use PDOException;

require_once 'core/model.php';

class Product extends Model
{

    protected static function db()
    {
        $dsn = 'mysql:dbname=mvc;host=db';
        $usuario = 'root';
        $contraseña = 'password';
        try {
            $db = new PDO($dsn, $usuario, $contraseña);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }
        return $db;
    }
    
    const PRODUCTS = [
        array(1, 'Cortacesped'),
        array(2, 'Pizarra'),
        array(3, 'Billar'),
        array(4, 'Dardos'),
    ];

    function __construct()
    { /*cons vacio*/
    }

    // Devuelve todos los productos
    public static function all()
    {
        return Product::PRODUCTS;
    }

    // Devolver un producto en particular
    public static function find($id)
    {
        return Product::PRODUCTS[$id-1];
    }
}
