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


cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION");
cuerpo($lanzaDados); //llamo a la vista
finCuerpo();
// **********************************************************
////vista cabecera donde podemos ver otros enlaces 

function cabecera() {}
//vista
function cuerpo($lanzaDados)
{
?>
    <h2>LANZAMIENTO DE UN DADO</h2>
<?php
    foreach ($lanzaDados as $indice => $valor) {
        echo "Lanzamiento " . ($indice + 1) . " del dado: " . $valor . "<br>";
    }
}
