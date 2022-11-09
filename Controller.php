<?php

require_once "Product.php";

class Controller
{
    function __construct()
    {
        // const vacio
    }

    /* 
        función que
        - recoge todos los productos
        - llama a vista de inventario
    */
    public function home()
    {
        $products = Product::all();
        require "views/home.php";
    }

    /*
        funcion que
        - muestra un producto en particular segun el id como parametroooooo
        - llama a vista de producto en concreto
    */
    public function show()
    {
        $id = $_GET["id"];
        $product = Product::find($id);
        require "views/show.php";
    }
}
