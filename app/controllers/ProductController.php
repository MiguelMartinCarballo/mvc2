<?php

namespace App\Controllers;
    
include "../Product.php"; 

class ProductController
{
    function __construct()
    {
        echo "<br>Constructor clase PRODUCTCONTROLLER";
    }

    function index()
    {
        // echo "<br>Dentro index de PRODUCTCONTOLLER";
        // metodo home de Controller mvc00
        $products = \Product::all();
        require "../app/views/home.php";
    }

    function show()
    {
        // echo "<br>Dentro show de PRODUCTCONTOLLER";
        // metodo show de Controller mvc00

        $id = $_GET["id"];
        $product = \Product::find($id);
        require "../app/views/show.php";
    }
}
