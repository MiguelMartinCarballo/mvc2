<?php

namespace App\Controllers;

include "../Product.php"; 
//include_once "./vendor/autoload.php";
use Dompdf\Dompdf;

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
        $products = \Product::all();
        require "../app/views/product.php";
    }

    function show()
    {
        // echo "<br>Dentro show de PRODUCTCONTOLLER";
        // metodo show de Controller mvc00

        $id = $_GET["id"];
        $product = \Product::find($id);
        require "../app/views/show.php";
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
