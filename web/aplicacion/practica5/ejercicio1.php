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
    echo "Valor: $var - Resultado: " . ($resultado ? "válido" : "inválido, hemos cogido el de por defecto") . "\n";
?>
<h5>valFilter</h5>
<?php
    //pasamos un valor valido dentro del minimo y el maximo, nos devuelve true, y no modifica el valor por el defecto
    $var = 4;
    $resultado = \VALFILTER\validaEntero($var, 3, 10, 9);
    echo "Valor: $var - Resultado: " . ($resultado ? "válido" : "inválido, hemos cogido el de por defecto") . "\n";
?>
<hr>
<h4>valida Real</h4>
<h5>valNormal</h5>
<?php
    //pasamos un valor valido dentro del minimo y el maximo para que nos devuelva true
    $var = 8;
    $resultado = \VALNORMAL\validaReal($var, 2, 12, 2);
    echo "Valor: $var - Resultado: " . ($resultado ? "válido" : "inválido, hemos cogido el de por defecto") 
?>
<h5>valFilter</h5>
<?php
    //pasamos un valor no valido dentro del minimo y el maximo, nos devuelve false, pero modifica el valor por el defecto
    $var = 8;
    $resultado = \VALFILTER\validaReal($var, 9, 15, 9);
    echo "Valor: $var - Resultado: " . ($resultado ? "válido" : "inválido,hemos cogido el de por defecto")
?>
<hr>
<h4>valida Fecha</h4>
<h5>valNormal</h5>
<!-- VAMOS A PROBAR EL MISMO METODO -->
<?php
    //pasamos un valor no valido y cogemos el de por defecto
    $fecha = "2023-10-15";
    $resultado = \VALNORMAL\validaFecha($fecha, "1970/01/01");
    echo "Valor: $fecha | Resultado: " . ($resultado ? "válido" : "inválido,hemos cogido el de por defecto") . "\n";
?>
<h5>valFilter</h5>
<?php
    //pasamos un valor valido 
    $fecha = "04/04/2004";
    $resultado = \VALFILTER\validaFecha($fecha, "1970-01-01");
    echo "Valor: $fecha | Resultado: " . ($resultado ? "válido" : "inválido,hemos cogido el de por defecto") . "\n";
?>
<hr>
<h4>valida Hora</h4>
<h5>valNormal</h5>
<!-- VAMOS A PROBAR EL MISMO METODO -->
<?php
    $hora = "14:30:00";
    $resultado = \VALNORMAL\validaHora($hora, "00:00:00");
    echo "Valor: $hora | Resultado: " . ($resultado ? "válido" : "inválido,,hemos cogido el de por defecto") . "\n";

?>
<h5>valFilter</h5>
<?php
    $hora = "29:25:33";
    $resultado = \VALNORMAL\validaHora($hora, "00:00:00");
    echo "Valor: $hora | Resultado: " . ($resultado ? "válido" : "inválido,,hemos cogido el de por defecto") . "\n";
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
