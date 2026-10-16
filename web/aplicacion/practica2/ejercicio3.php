<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
//barra de ubicacion logica que nos indica donde estamos
 $ubicacion = [
 "pagina principal"=> "../../index.php",
 "relacion 2"=> "./index.php",
 "Ejercicio 3"=>"ejercicio3.php"

 ];

 //CONTROLADOR
$cadenaArray = generarCadenaArray();
$cadenaAscii = generarCadenaAscii();

 /**
  * APARTADO A) A partir de un array en el que están todos los caracteres posibles que cumplen la condición.
  */
function generarCadenaArray()
{
    // Creamos un array con todos los caracteres permitidos: letras minúsculas (a-z), mayúsculas (A-Z) y números (0-9)
    $caracteres = array_merge(
        range('a', 'z'),
        range('A', 'Z'),
        range('0', '9')
    );

    $cadena = '';

    for ($i = 0; $i < 20; $i++)
    {
        // Genera una posición aleatoria comprendida entre 0 y el último índice del array de caracteres.
        $posicion = rand(0, count($caracteres) - 1);

        // Añade a la cadena el carácter que se encuentra
        $cadena .= $caracteres[$posicion];
    }

    return $cadena;
}

 /**
  * APARTADO b) A partir del código ASCII (se puede indicar un rango mayor y eliminar aquellos caracteres que no lo cumplan).
  */
function generarCadenaAscii()
{
    $cadena = "";

    while (strlen($cadena) < 20){

    $ascii = rand(48, 122);

        // Comprueba si el código ASCII generado corresponde a:
        // - Números (48-57)
        // - Letras mayúsculas (65-90)
        // - Letras minúsculas (97-122)
        if (
            ($ascii >= 48 && $ascii <= 57) ||
            ($ascii >= 65 && $ascii <= 90) ||
            ($ascii >= 97 && $ascii <= 122)
        )
        {
            // Convierte el código ASCII a su carácter equivalente mediante chr() y lo añade al final de la cadena.
            $cadena .= chr($ascii);
        }
    }

    return $cadena;
}
////////////////////////////////////////////////
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION",$ubicacion);
cuerpo($cadenaArray, $cadenaAscii); //llamo a la vista
finCuerpo();
// **********************************************************
////vista cabecera donde podemos ver otros enlaces 

function cabecera() {}
//vista
function cuerpo($cadenaArray, $cadenaAscii)
{
?>
<h2>CADENAS CON ARRAY Y CON ASCII</h2>
    
    <!-- Recorremos con forech la funcion para mostrar la cadena -->
    <h4>Usando array</h4>
   <?php
    $arrayCaracteres = str_split($cadenaArray);

    foreach ($arrayCaracteres as $caracter)
    {
        echo $caracter . " ";
    }
    ?>

    <!-- Recorremos con forech la funcion para mostrar la cadena -->
    <h4>Usando ASCII</h4>
    <?php
    $arrayCaracteres = str_split($cadenaAscii);

    foreach ($arrayCaracteres as $caracter)
    {
        echo $caracter . " ";
    }
    ?>
<?php
}
