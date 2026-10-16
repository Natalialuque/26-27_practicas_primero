<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
//barra de ubicacion logica que nos indica donde estamos
 $ubicacion = [
 "pagina principal"=> "../../index.php",
 "relacion 2"=> "./index.php",
 "Ejercicio 4"=>"ejercicio4.php"

 ];
 //CONTROLADOR 
// generamos las variables  con los numeros 
$var1 = number_format(17.5, 2, ",", ".");
$var2 = number_format(379987.24,2,",",".");

cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION",$ubicacion);
cuerpo($var1, $var2); //llamo a la vista
finCuerpo();
// **********************************************************
////vista cabecera donde podemos ver otros enlaces 

function cabecera() {}
//vista
function cuerpo($var1, $var2)
{


?>

<h2>Primer Valor</h2>
<div>
    <?php 
        echo str_pad($var1,15,'0',STR_PAD_LEFT)//str_pad sirve para rellenar una cadena hasta una longitud determinada.
    ?> 
</div>
<br>
<h2>Segundo Valor</h2>
<div>
    <?php 
        echo str_pad($var2,15,'0',STR_PAD_RIGHT) //el right o o left añade a un lado u otro
    ?>
</div>

<?php

}