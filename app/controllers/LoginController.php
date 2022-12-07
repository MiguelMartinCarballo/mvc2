<?php

namespace App\Controllers;

class LoginController
{
    function __construct()
    {
        echo "<br>Constructor clase LOGINCONTROLLER";
    }

    function index()
    {
        require "../app/views/login.php";
    }

    function verify()
    {
        /*
        if(isset($_POST['login'])){
            $usuario = $_POST['usuairo'];
            $pw = $_POST['password'];
            if($usuario = )
        }
        */
    }
}
