<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
$ubicacion = [
    "pagina principal" => "../../index.php",
    "relacion 1" => "./index.php",
    "Ejercicio 6" => "ejercicio6.php"

];
//controlador

//definimos aqui el array a usar 
$vector=array("primera" =>12.56, 24=>true, 67 =>23.76);


cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION",$ubicacion);
cuerpo($vector); //llamo a la vista
finCuerpo();
// **********************************************************
////vista cabecera donde podemos ver otros enlaces 

function cabecera() {}
//vista
function cuerpo($vector)
{
?>
<h2>ARRAY VECTOR</h2>


<h3>Simulación de foreach con funciones de recorrido</h3>

<?php
// current -->  Obtiene el valor actual
// key --> Obtiene la clave actual
// next --> Avanza al siguiente elemento 
// reset --> Sitúa el puntero al principio

reset($vector);

//recorrremos el array interno como un foreach 
while (key($vector) !== null) {

    $indice = key($vector);
    $valor = current($vector);

    //nos saca los indices 
    echo "Índice: $indice - Valor: ";

    //debemos verificar oara poder sacar el valor de una forma adecuada 
    if (is_bool($valor)) {
        echo $valor ? "true" : "false";
    } else {
        echo $valor;
    }

    echo "<br>";

    next($vector);
}
?>


<h3>Simulación de foreach con array_keys y array_values</h3>

<?php

$claves = array_keys($vector);
$valores = array_values($vector);

//recoremos las claves del vector 
for ($i = 0; $i < count($claves); $i++) {
    //sacamos su nombre de las claves 
    echo "Índice: {$claves[$i]} - Valor:";

    //debemos verificar oara poder sacar el valor de una forma adecuada 
    if (is_bool($valores[$i])) {
        echo $valores[$i] ? "true" : "false";
    } else {
        echo $valores[$i];
    }

    echo "<br>";
}

}
