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
    echo "hola"; //comentarios

    $var1 = 25;
    $cadena = "esto es una cadena";

    $var1+=12;
    echo $var1;
    ?>

<?php

}
