<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
$ubicacion = [
    "pagina principal" => "../../index.php",
    "relacion 1" => "./index.php",
    "Ejercicio 5" => "ejercicio5.php"

];

//controlador
//Tenemos que crear un array con una serie de valores 
$vector = array();

$vector[1] = "esto es una cadena";
$vector["posi1"] = 25.67;
$vector[] = false;
$vector["ultima"] = array(2,5,96);
$vector[56] = 23;



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
<h2>ARRAY CON CONTENIDO MULTIPLE</h2>
<?php
// Recorremos todo el array principal.

// $valor contiene el contenido almacenado en esa posición.
foreach ($vector as $indice => $valor) {

    // Mostramos la posición actual del array.
    echo "Posición $indice ";

    // gettype() devuelve el tipo de dato del contenido.
    // Según el tipo entraremos en un case u otro.
    switch (gettype($valor)) {

        // Si el contenido es un array.
        case "array":

            echo "contenido (array)  ";

            // Recorremos el array interno para mostrar sus valores.
            foreach ($valor as $dato) {
                echo $dato . " ";
            }

            break;

        // Si el contenido es un número entero.
        case "integer":

            echo "contenido (integer) ";

            // Mostramos el valor decimal y su equivalente en binario.
            echo "Entero con valor $valor, en binario " . decbin($valor);

            break;

        // Si el contenido es un número real (float/double).
        case "double":

            echo "contenido (double) ";

            // Mostramos el valor y su cuadrado.
            echo "$valor que al cuadrado es " . pow($valor, 2);

            break;

        // Si el contenido es una cadena de texto.
        case "string":

            echo "contenido (string) ";

            // Mostramos la cadena entre guiones.
            echo "-$valor-";

            break;

        // Si el contenido es un valor booleano (true o false).
        case "boolean":

            echo "contenido (boolean) ";

            // Mostramos el valor booleano.
            echo "Booleano " . ($valor ? "true" : "false");

            // Mostramos también su valor opuesto.
            echo " y su opuesto " . (!$valor ? "true" : "false");

            break;
    }

    echo "<br>";
}
}
