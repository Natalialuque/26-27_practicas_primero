<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once 'libreria.php'; //ESTO NOS INCLUDE LA LIBRERIA

//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
$ubicacion = [
    "pagina principal" => "../../index.php",
    "relacion 3" => "./index.php"
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
 <h1>Relación3:Funciones</h1>

 <h4>Apartado 1:Cuenta veces</h4>
<?php
   
    $array = [];//array en el que guardamos todo
    $cont = 0; //contador para las llamadas 

    //$array->donde guardamos, $clave->nombre de la posicion, $7->valor de esa posicon, $cont->contador de llamadas
    if (!cuentaVeces($array, "clave4", 3, $cont)) {
        echo "Error en clave4<br>";
    }

    if (!cuentaVeces($array, "daw", 28, $cont)) {
        echo "Error en daw<br>";
    }

    if (!cuentaVeces($array, "222adw", 222, $cont)) {
        echo "Error en 222adw<br>";
    }

    if (!cuentaVeces($array, "2daw", 6, $cont)) {
        echo "Error: la clave 2daw no es válida<br>";
    }

    if (!cuentaVeces($array, "789", 987, $cont)) {
        echo "Error en 789<br>";
    }

    // Muestras los resultados
    print_r($array);//para que el array se imprima correctamente 
    echo "<br>";

    echo "Número de llamadas: $cont";
    
?>
 <h4>Apartado 2:Generar Cadenas</h4>
<?php
//mostramos los genera cadena
   //esta da bien
    $cadena1 = generarCadena(7);

    if ($cadena1 === false) {
        echo "Error: longitud incorrecta";
    } else {
        echo "Cadena de 7 caracteres:". $cadena1;
    }
    echo "<br>";

    //esta es la de por defecto 
    $cadena2 = generarCadena();
    if ($cadena2 === false) {
        echo "Error: longitud incorrecta";
    } else {
        echo"Cadena por defecto de caracteres:". $cadena2;
    }
    echo "<br>";

    //esta da mal
    $cadena3 = generarCadena(-2);

    if ($cadena3 === false) {
        echo "Error: longitud incorrecta";
    } else {
        echo $cadena3;
    }
?>
 <h4>Apartado 3:Operaciones</h4>
<?php
/*Suma*/
    $resultado1 = operaciones(1, 2, 5, 7, 3, 4);

    if ($resultado1 !== false) {
        echo "Resultado suma: $resultado1 <br>";
    } else {
        echo "Error: número insuficiente de operandos.<br>";
    }

    /*Resta*/
    $resultado2 = operaciones(2, 20, 5, 3);

    if ($resultado2 !== false) {
        echo "Resultado resta: $resultado2 <br>";
    } else {
        echo "Error: número insuficiente de operandos.<br>";
    }

    /*multipliacion*/
    $resultado3 = operaciones(3, 2, 5, 4);

    if ($resultado3 !== false) {
        echo "Resultado multiplicación: $resultado3 <br>";
    }else {
        echo "Error: número insuficiente de operandos.<br>";
    }

    /*suma pares y resta impares*/
    $resultado4 = operaciones(5, 2, 5, 7, 3, 4);

    if ($resultado4 !== false) {
        echo "Resultado suma pares y resta impares: $resultado4 <br>";
    }else {
        echo "Error: número insuficiente de operandos.<br>";
    }

    /* Caso con error */
    $resultado5 = operaciones(1, 5);

    if ($resultado5 !== false) {
        echo "Resultado: $resultado5 <br>";
    }else {
        echo "Error: la función necesita al menos dos operandos.<br>";
    }
?>
<h4>Aartado 4:Devuelve </h4>
<?php
//Tres parametros 
$a1=7;
$devolver1 = devuelve($a1,4,3);
echo "<h5>Tres parametros</h5>";
if($devolver1!==false){
    echo "Suma: $a1<br>";
    echo "Producto: $devolver1<br>";
}else {
    echo "Error:los parametros deben ser numeros.<br>";
}

//El primer parametro solo 
$a2=5;
$devolver2 = devuelve($a2);
echo "<h5>Primer parametro</h5>";
if($devolver2!==false){
    echo "Suma: $a2<br>";
    echo "Producto: $devolver2<br>";
}else {
    echo "Error:los parametros deben numeros.<br>";
}

//El primer y el segundo parametro
$a3=6;
$devolver3 = devuelve($a3,4); 
echo "<h5>Primer y segundo parametro</h5>";
if($devolver3!==false){
    echo "Suma: $a3<br>";
    echo "Producto: $devolver3<br>";
}else {
    echo "Error:los parametros deben numeros.<br>";
}

//El primer y el tercer parametro 
$a4=4;
$devolver4 = devuelve($a4,c:23);
echo "<h5>Primer y tercer parametro</h5>";
if($devolver4!==false){
    echo "Suma: $a4<br>";
    echo "Producto: $devolver4<br>";
}else {
    echo "Error:los parametros deben numeros.<br>";
}
?>
<h4>Aartado 5:Devuelve </h4>
<?php

   
}
