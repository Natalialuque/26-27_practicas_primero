<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION");
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {}
//vista
function cuerpo()
{
?>      
    <br><br> cristian gay 

   <?php 
    echo "esto esta hecho";
    $var1 = 25;
    $cad1 = 'esto es una cadena';

    $var1 += 12;
    echo $var1;

    $una_cadena='hola';
    $unaCadena = 'adios';

    $var1 -= 17;
    echo $var1;
    $unaCadena = 45;
    echo $unaCadena;

    /**
     * El isset comprobaba si una varible es nula 
     */
    if (isset($cadena2)) {
        echo $cadena2;
    }

    /**
     * Valores 
     */
    $real = 1234.5678958789544;
    $real=0.43210876542;

    echo "el numero es $var1 <br>".PHP_EOL;
    echo "el numero es $var1 <br>".PHP_EOL;

    $real = null;
    echo $real;

    /**
     * Conversiones de diferentes formas 
     */
    $var = 125;
    $tipo=gettype($var);
    $var=(string)$var;
    $var=settype($var,"double");
    $tipo=gettype($var);
     $var = intval($var);
    $tipo = gettype($var);

    /**
     * 
     */
    //true en matematicas vale 1 entonces la suma es 2
    $var = 1 + true;

    $var = 1+1.5;
    //php intenta leer lo numérico y como la cadena empieza por 1 entonces el resultado es 2
    $var = 1 + "1hola";

    //lo mismo que antes extrae solo el ENTERO y se suma es decir 2 
    $var = 1 + "1.5hola";

    //Esto da un error
   // $var = 1 + "hola";

    //Esto da un error
    //$var = 1+ [];

    $aux =1252;
    $var="hola".$aux;

 ?>


<?php

}
