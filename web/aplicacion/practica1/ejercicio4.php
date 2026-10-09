<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
$ubicacion = [
    "pagina principal" => "../../index.php",
    "relacion 1" => "./index.php",
    "Ejercicio 4" => "ejercicio4.php"

];
//controlador
//Tenemos que hacer un bucle for anidado para que recorra filas y columnas para completarlo con los numeros del 1 al 5
define("FILAS",5); //Constante filas con la cantidad

//creamos una function piramide que vamos a pasarla luego como parametro
function piramide(){

$array=[]; //donde vamos a guardarlo 

//este primer for recorre desde 1 hasta FILAS 
for($i=1;$i<=FILAS;$i++){
    $fila=[]; //aqui almacenamos una fila completa 
    
    //recorremos el array para ir colocando los numeros en cada fila
    for($j = 1;$j <= $i; $j++){
         $fila[]= $i; //guardamos el numero correspondiente tantas veces necesario en la fila que toca
    }
    $array[]=$fila; //guardamos la fila en el array principal 
}
return $array;
}

$piramide = piramide(); //para poder pasarla como parametro 

cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION",$ubicacion);
cuerpo($piramide); //llamo a la vista
finCuerpo();
// **********************************************************
////vista cabecera donde podemos ver otros enlaces 

function cabecera() {}
//vista
function cuerpo($piramide)
{
?>
<h2>GENERAR PIRAMIDE DE NUMEROS CON ARRAY</h2>
<?php
  // Recorremos cada fila de la pirámide
 foreach ($piramide as $fila) {
         // Recorremos cada número de la fila
        foreach($fila as $valor){
           echo $valor . " "; //mostramos el valor
        }
        echo "<br>";
    }

}
