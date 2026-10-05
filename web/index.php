<?php
include_once(dirname(__FILE__) . "/cabecera.php");
//controlador

$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION");
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista cabecera donde podemos ver otros enlaces 
function cabecera() 
{
    /** */
}

//vista
function cuerpo()
{
?>
    <br><br>
     <h3>Ejercicios</h3>
    <ul>
        <li><a href="/aplicacion/practica1/index.php">Práctica 1</a></li> 
        

    </ul>   
        <br><br>

        <h3>Pruebas<h3>
    <ul>
       <li><a href="./aplicacion/pruebas/index.php">Acceso a pruebas</a></li>

    </ul>
    
<?php
}
