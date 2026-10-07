<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
$ubicacion = [
    "pagina principal" => "../../index.php",
    "relacion 1" => "./index.php",
    "Ejercicio 5" => "ejercicio5.php"

];

//controlador

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
<?php
}
