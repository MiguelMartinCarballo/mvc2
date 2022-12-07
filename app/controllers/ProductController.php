<?php

namespace App\Controllers;

include "../app/models/Product.php"; 

//include_once "./vendor/autoload.php";
use Dompdf\Dompdf;
use App\Models\Product;
use App\Models\ProductType;

class ProductController
{
    function __construct()
    {
        //echo "<br>Constructor clase PRODUCTCONTROLLER";
    }

    function index()
    {
        // echo "<br>Dentro index de PRODUCTCONTOLLER";
        // metodo home de Controller mvc00
        $products = Product::all();
        require "../app/views/product.php";
    }

    public function show($args)
    {
        //args es un array, tomamos el id con uno de estos métodos
        // $id = (int) $args[0];
        list($id) = $args;
        $product = Product::find($id);
        require('../app/views/show.php');        
    }

    public function create()
    {
        $types = ProductType::all();
        require '../app/views/create.php';
    }

    public function store()
    {
        $product = new Product();
        $product->name = $_REQUEST['name'];
        $product->type_id = $_REQUEST['type_id'];
        $product->price = $_REQUEST['price'];
        $product->fecha_compra = $_REQUEST['fecha_compra'];
        $product->insert();
        header('Location:/product');
    }

    public function edit($arguments)
    {
        $id = (int) $arguments[0];
        $product = Product::find($id);
        require '../app/views/edit.php';
    }

    public function update()
    {
        $id = $_REQUEST['id'];
        $product = Product::find($id);
        $product->name = $_REQUEST['name'];
        $product->type_id = $_REQUEST['type_id'];
        $product->price = $_REQUEST['price'];
        $product->fecha_compra = $_REQUEST['fecha_compra'];
        $product->save();
        header('Location:/product');
    }

    public function delete($arguments)
    {
    $id = (int) $arguments[0];
    $product = Product::find($id);
    $product->delete();
    header('Location:/product');
    }

    function pdf(){
        $dompdf = new Dompdf();
        $dompdf->loadHtml('<h1>Hola mundo</h1><br><a href="https://parzibyte.me/blog">By Parzibyte</a>');
        $dompdf->render();
        header("Content-type: application/pdf");
        header("Content-Disposition: inline; filename=documento.pdf");
        $dompdf->stream();
    }
}
