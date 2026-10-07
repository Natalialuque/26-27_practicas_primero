<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
//barra logica
$ubicacion = [
    "pagina principal" => "../../index.php",
    "relacion 1" => "./index.php",
    "Ejercicio 3" => "ejercicio3.php"

];

//controlador --> creacion de los arrays

//Primer array con varias sentencias 
$arrayA = [];

$arrayA[1]=10;
$arrayA[16]=20;
$arrayA[54]=30;

$arrayA[]=34; //añade al final

$arrayA["uno"]="cadena";
$arrayA["dos"]=true;
$arrayA["tres"]=1.345;

$arrayA["ultima"]=[1,34,"nueva"];

//Segundo array unica sentencia 

$arrayB = array(
    //numeros 
    1=>10,
    16=>20,
    54=>30,

    //la ultima 
    55=>34,

    //cadenas
    "uno"=>"cadena",
    "dos"=>true,
    "tres"=>1.345,

    //array interno 
    "ultima"=>array(1,34,"nueva")
);


//Tercer array 
$arrayC=[
     //numeros 
    1=>10,
    16=>20,
    54=>30,

    //la ultima 
    55=>34,
     //cadenas
    "uno"=>"cadena",
    "dos"=>true,
    "tres"=>1.345,

    //array interno 
    "ultima"=>[1,34,"nueva"]
];


cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION",$ubicacion);
cuerpo($arrayA,$arrayB,$arrayC); //llamo a la vista
finCuerpo();
// **********************************************************
////vista cabecera donde podemos ver otros enlaces 

function cabecera() {}
//vista
function cuerpo($arrayA,$arrayB,$arrayC)
{
?>
<h2>ARRAYS</h2>
<br>
<h3>PRIMER ARRAY USANDO VARIAS SENTENCIAS</h3>
<?php
        foreach($arrayA as $indice => $valor){
        
        //mostramos el indice en el que estamos 
        echo "Indice: " . $indice . "<br>";

        //vemos si hay un array dentro hay array interno
        if (is_array($valor)) {

            echo "Contenido del array interno:: ";

            foreach ($valor as $elemento) {
                echo $elemento . " ";
            }
            //mostramos directamente el valor de la posicion del array
        } else {

            echo "Contenido: " . $valor;
        }

        echo "<hr>";
         }
?>
 
 <h3>SEGUNDO ARRAY EN UNA SENTENCIA</h3>
<?php
    foreach ($arrayB as $indice => $valor) {

        echo "Indice: " . $indice . "<br>";

        // Si el valor es un array, lo recorremos
        if (is_array($valor)) {

            echo "Contenido del array interno: ";

            foreach ($valor as $elemento) {
                echo $elemento . " ";
            }

            echo "<br>";
        } else {

            echo "Contenido: " . $valor . "<br>";
        }

        echo "<hr>";
    }
?>

 <h3>TERCER ARRAY EN UNA SENTENCIA CON FORMATO NUEVO</h3>
<?php
       foreach ($arrayC as $indice => $valor) {

        echo "Índice: " . $indice . "<br>";

        // Si el valor es un array, lo recorremos
        if (is_array($valor)) {

            echo "Contenido del array interno: ";

            foreach ($valor as $elemento) {
                echo $elemento . " ";
            }

            echo "<br>";
        } else {

            echo "Contenido: " . $valor . "<br>";
        }

        echo "<hr>";
    }

}
