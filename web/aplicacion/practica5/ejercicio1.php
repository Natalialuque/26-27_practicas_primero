<?php

use function VALNORMAL\validaEntero;

include_once(dirname(__FILE__) . "/../../cabecera.php");
/**
 * Con esto hacemos las pruebas de las dos validaciones
 */
require_once(dirname(__FILE__) . "/api/val_normal.php");
require_once(dirname(__FILE__) . "/api/val_filter.php");



//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
//barra de ubicacion logica que nos indica donde estamos
 $ubicacion = [
 "pagina principal"=> "../../index.php",
 "relacion 1"=> "./index.php",
 "Ejercicio 1"=>"ejercicio1.php"

 ];


cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION",$ubicacion);
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************
////vista cabecera donde podemos ver otros enlaces 

function cabecera() {}
//vista
function cuerpo()
{
?>
<hr>
<h4>valida Entero</h4>
<h5>valNormal</h5>
<?php
    //pasamos un valor no valido dentro del minimo y el maximo, nos devuelve false, pero modifica el valor por el defecto
    $var = 1;
    $resultado = \VALNORMAL\validaEntero($var, 5, 9, 7);
    echo "Valor: $var - Resultado: " . ($resultado ? "válido" : "inválido") . "\n";
?>
<h5>valFilter</h5>
<?php
    //pasamos un valor valido dentro del minimo y el maximo, nos devuelve true, y no modifica el valor por el defecto
    $var = 4;
    $resultado = \VALFILTER\validaEntero($var, 3, 10, 9);
    echo "Valor: $var - Resultado: " . ($resultado ? "válido" : "inválido") . "\n";
?>
<hr>
<h4>valida Real</h4>
<h5>valNormal</h5>
<?php
?>
<h5>valFilter</h5>
<?php
?>
<hr>
<h4>valida Fecha</h4>
<h5>valNormal</h5>
<?php
?>
<h5>valFilter</h5>
<?php
?>
<h4>valida Hora</h4>
<h5>valNormal</h5>
<?php
?>
<h5>valFilter</h5>
<?php
?>
<h4>valida Email</h4>
<h5>valNormal</h5>
<?php
?>
<h5>valFilter</h5>
<?php
?>
<h4>valida Cadena</h4>
<h5>valNormal</h5>
<?php
?>
<h5>valFilter</h5>
<?php
?>
<h4>valida Expresion</h4>
<h5>valNormal</h5>
<?php
?>
<h5>valFilter</h5>
<?php
?>
<h4>valida Rango</h4>
<h5>valNormal</h5>
<?php
?>
<h5>valFilter</h5>
<?php
}
