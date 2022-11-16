<?php

namespace Dwes\Galaxias;

const RADIO = 1.25;

function observar($mensaje){
    echo "<br>Estoy mirando a la galaxia $mensaje";
}

class Galaxia
{
    function __construct()
    {
        $this->nacimiento();
    }

    function nacimiento()
    {
        echo "<br>Soy una nueva galaxia";
    }

    static function muerte(){
        echo "<br>Me desaparezco";
    }

    function __toString()
    {
        return "esto son galaxias";
    }
}
