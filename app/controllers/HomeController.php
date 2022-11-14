<?php

class HomeController
{
    function __construct()
    {
        //echo "<br>Constructor clase HOMECONTROLLER";
    }

    function index()
    {
        //echo "<br>Dentro index de HOMECONTOLLER";
        $products = Product::all();
        require "../views/home.php";
    }

    function show()
    {
        //echo "<br>Dentro show de HOMECONTOLLER";

        require "../views/show.php";
    }
}
