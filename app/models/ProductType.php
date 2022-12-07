<?php
namespace App\Models;

use PDO;
use Core\Model;

require_once '../core/Model.php';
/**
*
*/
class ProductType extends Model
{
    public function __construct()
    {
        //$this->fecha_compra = \DateTime::createFromFormat('Y-m-d', $this->fecha_compra);
    }

    public static function all(){
        $db = ProductType::db();
        $statement = $db->query('SELECT * FROM product_types');
        $products = $statement->fetchAll(PDO::FETCH_CLASS, ProductType::class);

        return $products;
    }

    public static function find($id)
    {
        $db = ProductType::db();
        $stmt = $db->prepare('SELECT * FROM product_types WHERE id=:id');
        $stmt->execute(array(':id' => $id));
        $stmt->setFetchMode(PDO::FETCH_CLASS, ProductType::class);
        $product = $stmt->fetch(PDO::FETCH_CLASS);
        return $product;
    }

    public function insert()
    {
        $db = ProductType::db();
        $stmt = $db->prepare('INSERT INTO product_types(name, type_id, price, fecha_compra) VALUES(:name, :type_id, :price, :fecha_compra)');
        $stmt->bindValue(':name', $this->name);
        $stmt->bindValue(':type_id', $this->type_id);
        $stmt->bindValue(':price', $this->price);
        $stmt->bindValue(':fecha_compra', $this->fecha_compra);
        return $stmt->execute();
    }

    public function save()
    {
        $db = ProductType::db();
        $stmt = $db->prepare('UPDATE product_types SET name = :name, type_id = :type_id, price = :price, fecha_compra = :fecha_compra WHERE id = :id');
        $stmt->bindValue(':id', $this->id);
        $stmt->bindValue(':name', $this->name);
        $stmt->bindValue(':type_id', $this->type_id);
        $stmt->bindValue(':price', $this->price);
        $stmt->bindValue(':fecha_compra', $this->fecha_compra);
        return $stmt->execute();
    }

    public function delete()
    {
        $db = ProductType::db();
        $stmt = $db->prepare('DELETE FROM product_types WHERE id = :id');
        $stmt->bindValue(':id', $this->id);
        return $stmt->execute();
    }

    public function products()
    {
        //un producto pertenece a un tipo:
        $db = ProductType::db();
        $statement = $db->prepare('SELECT * FROM product WHERE type_id = :type_id');
        $statement->bindValue(':type_id', $this->id);
        $statement->execute();
        $products = $statement->fetchAll(PDO::FETCH_CLASS, Product::class);

        return $products;
    }

    public function __get($atributoDesconocido)
    {
        // return "atributo $atributoDesconocido desconocido";
        if (method_exists($this, $atributoDesconocido)) {
            $this->$atributoDesconocido = $this->$atributoDesconocido();
            return $this->$atributoDesconocido;
            // echo "<hr> atributo $x <hr>";
        }
    }
}