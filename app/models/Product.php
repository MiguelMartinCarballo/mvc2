<?php
namespace App\Models;

use PDO;
use Core\Model;

require_once '../core/Model.php';
/**
*
*/
class Product extends Model
{
    public function __construct()
    {
        //$this->fecha_compra = \DateTime::createFromFormat('Y-m-d', $this->fecha_compra);
    }

    public static function all(){
        $db = Product::db();
        $statement = $db->query('SELECT * FROM products');
        $products = $statement->fetchAll(PDO::FETCH_CLASS, Product::class);

        return $products;
    }

    public static function find($id)
    {
        $db = Product::db();
        $stmt = $db->prepare('SELECT * FROM products WHERE id=:id');
        $stmt->execute(array(':id' => $id));
        $stmt->setFetchMode(PDO::FETCH_CLASS, Product::class);
        $product = $stmt->fetch(PDO::FETCH_CLASS);
        return $product;
    }

    public function insert()
    {
        $db = Product::db();
        $stmt = $db->prepare('INSERT INTO products(name, type_id, price, fecha_compra) VALUES(:name, :type_id, :price, :fecha_compra)');
        $stmt->bindValue(':name', $this->name);
        $stmt->bindValue(':type_id', $this->type_id);
        $stmt->bindValue(':price', $this->price);
        $stmt->bindValue(':fecha_compra', $this->fecha_compra);
        return $stmt->execute();
    }

    public function save()
    {
        $db = Product::db();
        $stmt = $db->prepare('UPDATE products SET name = :name, type_id = :type_id, price = :price, fecha_compra = :fecha_compra WHERE id = :id');
        $stmt->bindValue(':id', $this->id);
        $stmt->bindValue(':name', $this->name);
        $stmt->bindValue(':type_id', $this->type_id);
        $stmt->bindValue(':price', $this->price);
        $stmt->bindValue(':fecha_compra', $this->fecha_compra);
        return $stmt->execute();
    }

    public function delete()
    {
        $db = Product::db();
        $stmt = $db->prepare('DELETE FROM products WHERE id = :id');
        $stmt->bindValue(':id', $this->id);
        return $stmt->execute();
    }

    public function setPassword($password)
    {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $db = Product::db();
        $stmt = $db->prepare('UPDATE products SET password = :password WHERE id = :id');
        $stmt->bindValue(':id', $this->id);
        $stmt->bindValue(':password', $password);
        $stmt->execute();
        return $password;
    }

    public function passwordVerify($password)
    {
        return password_verify($password, $this->password);
    }
}