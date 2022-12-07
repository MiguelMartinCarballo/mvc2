<?php

//horas
echo "<br>la hora es: " . time();

echo "<br>la hora en un mes: " . strtotime("+1 month");

//fechas: date, DateTime

echo "<br>la fecha es: " . date("d/F/y");

$fecha = new DateTime("now");

echo "<br><br>";

$fecha = new DateTime("+11 weeks");

var_dump($fecha);

echo "<br><br>intento de fecha: " . $fecha->format("d/M/Y");

echo "<br><br>Mi fecha personalizada: ";
$mifecha = DateTime::createFromFormat("d/m/Y", "09/07/2018");
var_dump($mifecha);
echo "<br><br>Fecha en español: " . $mifecha->format("j@n@Y");