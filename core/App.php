<?php

namespace Core;

/*
    - Si la url no especifica ningun controlador (recurso) => asigno uno por defecto => home
    - si la url no especifica ningun metodo => asigno por defecto : index
*/

class App
{
    function __construct()
    {
        // http://mcv.local/product/show => http://mcv.local/index.php?url=product/show
        if (isset($_GET["url"]) && !empty($_GET["url"])) {
            $url = $_GET["url"];
        } else {
            $url = "home";
        }

        // /product/show/5 => product: recurso ; show: action ; 5: parametro
        $arguments = explode('/', trim($url, '/'));
        $controllerName = array_shift($arguments); // product : ProductController
        $controllerName = ucwords($controllerName) . "Controller";
        if (count($arguments)) {
            $method = array_shift($arguments);
        }else{
            $method = "index";
        }

        // voy a cargar el controlador. ProductController.php
        $file = "../app/controllers/$controllerName" . ".php";
        if(file_exists($file)){
            require_once $file; // importo el fichero si existe
        }else{
            http_response_code(404);
            die("No encontrado");
        }

        // existe el metodo en el controlador solicitado por url
        $controllerName = "\\App\\Controllers\\$controllerName";
        $controllerObject = new $controllerName; // Objeto de la clase
        if(method_exists($controllerObject, $method)){
            $controllerObject->$method($arguments); // metodo ok -> lo invoco
        }else{
            http_response_code(404);
            die("No encontrado");
        }

    }

}
