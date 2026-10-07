 
<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");

//barra de ubicacion logica que nos indica donde estamos
 $ubicacion = [
 "pagina principal"=> "../../index.php",
 "relacion 1"=> "./index.php",
 "Ejercicio 1"=>"ejercicio1.php"

 ];

 $GLOBALS["ubicacion"]=$ubicacion;


cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION");
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************
////vista cabecera donde podemos ver otros enlaces 

function cabecera() {}
//vista
function cuerpo()
{

//titulo del enunciado 
 echo"<h3>FUNCIONES MATEMATICAS</h3>";
 
  echo "<ul>";

 //round 
 $a =round(5.3);
 echo"<li>El resultado del redondeo de (5.3) es: $a</li>";

 //floor 
 $b=floor(2.4);
echo"<li>El resultado de floor de (2.4) es: $b</li>";

//sqrt 
$c=sqrt(8.4);
echo"<li>El resultado de sqrt de (8.4) es: $c</li>";

//De entero a hexadecimal 
$d = dechex(255);
echo"<li>El resultado de entero a numero decimal de (255) es: $d</li>";

//pow
$e = pow(2, 5);
echo "<li>El resultado de pow(2^5) es: $e</li>";

//de base 4 a base 8
$f=base_convert(123,4,8);
echo "<li>El resultado de pasar un numero de base 4 a base 8 (123) es: $f</li>";

//abs
$g = abs(-15);
echo "<li>El resultado de abs(-15) es: $g</li>";

//max
$h = max(3, 7, 2, 9);
echo "<li>El resultado de max(3, 7, 2, 9) es: $h</li>";

echo "</ul>";
 
//PARTE DOS DEL EJERCICIO 
echo"<h4>Binario - Octal - Hexadicimal </h4>";
echo "<ul>";

 // Variables en distintas bases
 $binario = 0b1010;       // Binario (10 en decimal)
 $octal = 013;            // Octal (10 en decimal)
 $hexadecimal = 0xC;      // Hexadecimal (10 en decimal)

echo "<li>La variable(0b1010) en binario es en decimal: $binario </li>";
echo "<li>La variable (013) en octal es en decimal: $octal </li>";
echo "<li>La variable (0xC) en hexadecimal es en decimal: $hexadecimal </li>";

echo "</ul>";


}

 