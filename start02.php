<?php

// recurso/accion/parametro
    // recurso: controladores
    // accion: metodos del controlador . controlador -> show(), find
    // parametros: find -> id de producto

require_once "../Controller.php";

$app = new Controller();

//defino variable de petición en la url

// 1- regooger el recoger el metodo que se pasa por parámetro
// sino
if (isset($_GET["method"])) {
    $method = $_GET["method"]; //show, find, create, update...
}else{
    $method = "home";
}    

if (method_exists($app, $method)){
    $app->$method();
}else{
    http_response_code(404);
    die("Metodo no encontrado"); //exit 
}


