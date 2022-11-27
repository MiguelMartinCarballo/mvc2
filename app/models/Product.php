<?php
namespace App\Models;

use PDO;
use Core\Model;

require_once '../core/Model.php';
/**
*
*/
class User extends Model
{
    public function __construct()
    {
        $this->birthdate = DateTime::createFromFormat('Y-m-d', $this->birthdate);
    }

    public static function all(){ }
    public static function find($id){ }
    public function insert(){ }
    public function delete(){ }
    public function save(){ }
}