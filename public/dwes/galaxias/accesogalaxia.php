<?php

    namespace Dwes\Galaxias;

    echo "<br> Namescape actual: " . __NAMESPACE__;


    /**
     * Direccinamiento namespace;
     * 1 - Sin direccinamiento
     * 2 - Direccionamiento relativo
     * 3 - Direccionamiento absoluto
     */

    include "galaxia1.php";

    echo "<h2>Sin direccionamiento</h2>";

    echo "<br>Radio de la galaxia: " . RADIO;
    observar("Via Lactea");

    $gl = new Galaxia();
    Galaxia::muerte();


    echo "<h2>Direccionamiento relativo</h2>";
    include "pegaso/pegaso.php";

    echo "<br>Radio de la galaxia: " . Pegaso\RADIO;
    Pegaso\observar("Pegaso");
    $gl = new Pegaso\Galaxia();
    Pegaso\Galaxia::muerte();



    echo "<h2>Direccionamiento Absoluto</h2>";

    echo "<br>Radio de la galaxia: " . \Dwes\Galaxias\Pegaso\RADIO;
    \Dwes\Galaxias\Pegaso\observar("Pegaso");
    $gl = new \Dwes\Galaxias\Pegaso\Galaxia();
    \Dwes\Galaxias\Pegaso\Galaxia::muerte();

    use const \Dwes\Galaxias\Pegaso\RADIO;
    use function \Dwes\Galaxias\Pegaso\observar;
    use \Dwes\Galaxias\Galaxia;

    echo "<br><br><br>el radio es: " . RADIO;
    echo "<br><br><br>observo en pegaso: " . observar("Otra galaxia");
    echo "<br><br><br>objeto de galaxia genenerico: " . new Galaxia();

    //Apodar namespace -> alias
    use \Dwes\Galaxias\Pegaso as Seiya;
    Seiya\observar("<br><br><br>Observando a Seiya");
