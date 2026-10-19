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
    $array = [];//esto es el array en el que vamos guardando todo
    $cont = 0;//este valor se va sumando, es el contador

    // Veces que hemos llamado al método
    cuentaVeces($array, "clave4", 3, $cont); //$array->donde guardamos, $clave->nombre de la posicion, $7->valor de esa posicon, $cont->contador de llamadas
    cuentaVeces($array, "daw", 28, $cont);
    cuentaVeces($array, "222adw", 222, $cont);
    cuentaVeces($array, "2daw", 6, $cont);//NO LO MUESTRA PORQUE AL SER FALSO EL ARRAY LO IGNORA
    cuentaVeces($array, "789", 987, $cont);

    // Muestras los resultados
    print_r($array); //para que el array se imprima correctamente 
    echo "<br>";
    echo "Número de llamadas: $cont";
    
?>
 <h4>Apartado 2:Generar Cadenas</h4>
<?php
//mostramos los genera cadena
    echo "Cadena de 7 caracteres:".generarCadena(7);
    echo "<br>";
    echo "Cadena de 10 caracteres:".generarCadena();
    echo "<br>";
    echo "Cadena de 2 caracteres:".generarCadena(2);

?>
 <h4>Apartado 3:Operaciones</h4>
<?php

}
