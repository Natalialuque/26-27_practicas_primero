<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
//barra de ubicacion logica que nos indica donde estamos
 $ubicacion = [
 "pagina principal"=> "../../index.php",
 "relacion 2"=> "./index.php",
 "Ejercicio 2"=>"ejercicio2.php"

 ];

//CONTROLADOR h
// Cadena con la que vamos a trabajar
$cadena = "Está la niña en casa";

// Longitud usando mb_strlen porque hay caracteres UTF8
$tamCadena = mb_strlen($cadena);

// Localizar la palabra niña
$posNina = mb_strpos($cadena, "niña");

// Posición del espacio después de niña
$posEspacio = $posNina + mb_strlen("niña");

// Sustitución del espacio por "/mujer "
$cadenaModificada = mb_substr($cadena, 0, $posEspacio)
        . "/mujer "
        . mb_substr($cadena, $posEspacio + 1);

// Separación por la letra a
$partes = explode("a", $cadena);

cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION",$ubicacion);
cuerpo($cadena,$tamCadena,$partes,$cadenaModificada); //llamo a la vista
finCuerpo();
// **********************************************************
////vista cabecera donde podemos ver otros enlaces 

function cabecera() {}
//vista
function cuerpo($cadena,$tamCadena,$partes,$cadenaModificada)
{
?>
<h3>CADENA MULTIPLE</h3>
<hr>
<h4>Cadena original</h4>
<?php 
    echo $cadena; 
?>
<hr>

<!-- APARTADO 1 -->
<h4>1. Mostrar cada carácter con tantos espacios como su posición</h4>
<br>
<?php

/*
 * Forma NO válida para UTF8.
 *
 * for($i=0; $i<strlen($cadena); $i++)
 * {
 *     echo str_repeat(" ", $i);
 *     echo $cadena[$i] . PHP_EOL;
 * }
 */

/*
 * Forma NO válida para UTF8.
 * substr tampoco trata correctamente caracteres multibyte.
 *
 * for($i=0; $i<strlen($cadena); $i++)
 * {
 *     echo str_repeat(" ", $i);
 *     echo substr($cadena, $i, 1) . PHP_EOL;
 * }
 */

/*
 * Forma correcta usando mb_substr.
 */
for ($i = 0; $i < $tamCadena; $i++) {

    echo str_repeat("&nbsp;", $i);

    echo mb_substr($cadena, $i, 1);

    echo "<br>";
}

?>
</br>

<hr> 

<!-- APARTADO 2 -->
<h4>2. Cadena en orden inverso</h4>
<br>
<?php

/*
 * Recorremos usando índices negativos.
 */

for ($i = 0; $i < $tamCadena; $i++) {

    $caracter = mb_substr($cadena, -($i + 1), 1);

    // Posiciones pares en mayúscula
    if ($i % 2 == 0) {
        $caracter = mb_strtoupper($caracter);

    } else {
        $caracter = mb_strtolower($caracter);
    }

    echo str_repeat(" ", $i);
    echo $caracter;
    echo "<br>";
}

?>
</br>

<hr>

<!-- APARTADO 3 -->
<h3>3. Separar la cadena usando la letra a</h3>
<?php

foreach ($partes as $parte) {
    echo $parte . "<br>";
}
?>

<hr>

<!-- APARTADO 4 -->
<h3>4. Sustituir el espacio después de "niña" por "/mujer "</h3>
<?php
echo $cadenaModificada;

?>

<?php

}
