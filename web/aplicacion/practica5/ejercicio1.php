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
 "relacion 5"=> "./index.php",
 "Ejercicio 1" => "ejercicio 1"

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
    echo "Valor: $hora | Resultado: " . ($resultado ? "válido" : "inválido,hemos cogido el de por defecto") . "\n";

?>
<h5>valFilter</h5>
<?php
    $hora = "29:25:33";
    $resultado = \VALNORMAL\validaHora($hora, "00:00:00");
    echo "Valor: $hora | Resultado: " . ($resultado ? "válido" : "inválido,hemos cogido el de por defecto") . "\n";
?>
<hr>
<h4>valida Email</h4>
<h5>valNormal</h5>
<?php
    $email = "ncabluq878@educaand.com";
     $resultado = \VALNORMAL\validaEmail($email, "aaaa@bbbb.ccc");
    echo "Valor: $email | Resultado: " . ($resultado ? "válido" : "inválido,hemos cogido el de por defecto") . "\n";

?>
<h5>valFilter</h5>
<?php
    $email = "ncabluq878educaand.com";
     $resultado = \VALFILTER\validaEmail($email, "aaaa@bbbb.ccc");
    echo "Valor: $email | Resultado: " . ($resultado ? "válido" : "inválido,hemos cogido el de por defecto") . "\n";

?>
<hr>
<h4>valida Cadena</h4>
<h5>valNormal</h5>
<!-- VAMOS A PROBAR EL MISMO METODO -->
<?php
    $longi = 15;

    $cadena = "buenas Natalia";
    $resultado = \VALNORMAL\validaCadena($cadena,$longi,"buenas nombre");
    echo "Valor: $cadena | Resultado: " . ($resultado ? "válido" : "inválido,hemos cogido el de por defecto") . "\n";
?>
<h5>valFilter</h5>
<?php
    $cadena = "buenas Natalia su pedido ha sido cancelado debido";
    $resultado = \VALFILTER\validaCadena($cadena,$longi,"buenas nombre");
    echo "Valor: $cadena | Resultado: " . ($resultado ? "válido" : "inválido,hemos cogido el de por defecto") . "\n";
?>
<hr>
<h4>valida Expresion</h4>
<h5>valNormal</h5>
<?php
    $expresion ="/^[A-Z][a-zA-Z]{4}[1-9]{2}$/";
             
    $cadena="Buenas44"; 
    $resultado = \VALNORMAL\validaExpresion($cadena,$expresion,"Ajjjj44");
    echo "Valor: $cadena | Resultado: " . ($resultado ? "válido" : "inválido,hemos cogido el de por defecto") . "\n";
?>
<h5>valFilter</h5>
<?php
 $expresion ="/^[A-Z][a-zA-Z]{4}[1-9]{2}$/";
             
    $cadena="Adios14"; 
    $resultado = \VALFILTER\validaExpresion($cadena,$expresion,"Ajjjj44");
    echo "Valor: $cadena | Resultado: " . ($resultado ? "válido" : "inválido,hemos cogido el de por defecto") . "\n";
?>
<hr>
<h4>valida Rango</h4>
<h5>valNormal</h5>
<?php
    $posibles = ["rojo", "verde", "azul"];
             
    $valor="verde"; 
    $resultado = \VALNORMAL\validaRango($valor,$posibles,1);
    echo "Valor: $valor | Resultado: " . ($resultado ? "válido" : "inválido") . "\n";

?>
<h5>valFilter</h5>
<?php
    $posibles = ["rojo", "verde", "azul"];
             
    $valor="lila"; 
    $resultado = \VALFILTER\validaRango($valor,$posibles,1);
    echo "Valor: $valor | Resultado: " . ($resultado ? "válido" : "inválido") . "\n";

}
