<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
//barra de ubicacion logica que nos indica donde estamos
$ubicacion = [
    "pagina principal" => "../../index.php",
    "relacion 2" => "./index.php",
    "Ejercicio 2" => "ejercicio2.php"

];

$GLOBALS["Ubicacion"] = $ubicacion;


//controlador
//aqui es donde tenemos que obtener los arrays 

//PARTE 1--> Necesito un array en el que guardo las tiradas, 
//usamos el for para recorrerlo donde en cada vuelta generamos
// un numero alatorio entre 1 y 6 y por ultimo guardamos el valor 

function lanzaDado()
{
    $arrayTiradas = [];

    for ($i = 1; $i <= 6; $i++) {
        $num = mt_rand(1, 6);

        $arrayTiradas[] = $num;
    }

    return $arrayTiradas;
}

//guardamos dicha funcion en un parametro para pasarselo a la vista
$lanzaDados = lanzaDado();



//PARTE 2 --> Tenemos que definir una constante N, necesitamos un bucle while y generar una serie de numeros aleatrios, y para finalizar contar cuantas veces ha salido la cara de dicho dado
//definimos la constante N y los 100 lanzamientos 
define("N", 1000);
function contarLanzamientos(){

    //contador que inicializa las posiciones del array
    $contador = [1 => 0,2 => 0,3 => 0,4 => 0,5 => 0, 6 => 0 ];

    //vamos recorriendo en el while 
    $i = 0;

    while($i < N)
    {
        //generamos el numero ale del 1 al 6
        $num = (mt_rand() % 6) + 1;

        //y contamos las veces que aparece 
        $contador[$num]++;

        $i++;
    }

    //decolvermos dicho contador con los resultados
    return $contador;
}

//guardamos dicha funcion en un parametro para pasarselo a la vista
$contarLanzamientos = contarLanzamientos();


cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION");
cuerpo($lanzaDados,$contarLanzamientos); //llamo a la vista
finCuerpo();
// **********************************************************
////vista cabecera donde podemos ver otros enlaces 

function cabecera() {}
//vista
function cuerpo($lanzaDados,$contarLanzamientos){
?>
    <h2>LANZAMIENTO DE UN DADO</h2>
<?php
    
    foreach ($lanzaDados as $indice => $valor) {
        echo "<ul><li>Lanzamiento " . ($indice + 1) . " del dado: " . $valor . "<br></li></ul>";
    }

?>
    <h4>Lanzando el dado 1000 veces</h4>
<?php 

//hola buenos dias 
    foreach($contarLanzamientos as $cara => $veces)
    {
        echo "<ul><li>El $cara ha salido $veces veces <br></li></ul>";
    }
}
