<?php

namespace App\Controllers;

include "../app/models/Product.php"; 

//include_once "./vendor/autoload.php";
use Dompdf\Dompdf;
use App\Models\Product;

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

    function pdf(){
        $dompdf = new Dompdf();
        $dompdf->loadHtml('<h1>Hola mundo</h1><br><a href="https://parzibyte.me/blog">By Parzibyte</a>');
        $dompdf->render();
        header("Content-type: application/pdf");
        header("Content-Disposition: inline; filename=documento.pdf");
        $dompdf->stream();
    }
}
