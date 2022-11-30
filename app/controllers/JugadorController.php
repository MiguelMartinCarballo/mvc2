<?php

namespace App\Controllers;

use App\Models\Jugador;

/**
 *
 */
class JugadorController
{

    function __construct()
    {
        // echo "En JugadorController";
    }

    public function index()
    {
        $jugadores = Jugador::all();
        require "../app/views/jugador/index.php";
    }

    public function create()
    {
        require "../app/views/jugador/create.php";
    }

    public function edit($arguments)
    {
        // !!  COMPLETAR  !!
        $id = (int) $arguments[0];
        $jugador = Jugador::find($id);
        require "../app/views/jugador/create.php";
    }

    public function store()
    {
        // !!  COMPLETAR  !!
        $jugador = new Jugador();
        $jugador->nombre = $_POST['nombre'];
        $jugador->nacimiento = $_POST['nacimiento'];
        $jugador->puesto = $_POST['puesto'];
        if (isset($_POST['id'])) {
            $jugador->id = $_POST['id'];
            $jugador->save();
        } else {
            $jugador->insert();
        }
        $destino = "../fotos/" . $_FILES["myfile"]["name"];
        move_uploaded_file($_FILES["myfile"]["tmp_name"], $destino);
        header('Location: /jugador');
    }

    public function titular($arg)
    {
        // !!  COMPLETAR  !!
        session_start();
        $id = (int) $arg[0];
        if (isset($_SESSION['titulares'])) {
            $titulares = unserialize($_SESSION['titulares']);
        } else {
            $titulares = [];
        }
        $titulares[] = $id;
        $_SESSION['titulares'] = serialize($titulares);

        header('Location: /jugador');
    }
    public function titulares()
    {
        // !!  COMPLETAR  !!
        $jugadores = [];
        if (isset($_SESSION['titulares'])) {
            $titulares = unserialize($_SESSION['titulares']);
            foreach ($titulares as $id) {
                $jugadores[] = Jugador::find($id);
            }
        }
        require "../app/views/jugador/titulares.php";
    }
    public function quitar($arg)
    {
        // !!  COMPLETAR  !!
        $id = (int) $arg[0];
        if (isset($_SESSION['titulares'])) {
            $titulares = unserialize($_SESSION['titulares']);
        } else {
            $titulares = [];
        }
        
        foreach($titulares as $pos => $titular){
            if($titular == $id){
                unset($titulares[$pos]);
            } 
        }
        $_SESSION['titulares'] = serialize($titulares);
        header('Location: /jugador/titulares');
    }
}
