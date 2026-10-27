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
     <h3 id="TituloCuerpo">Ejercicios</h3>
    <ul>
        <li><a href="/aplicacion/practica1/index.php">Práctica 1</a></li> 
        <li><a href="/aplicacion/practica2/index.php">Práctica 2</a></li> 
        <li><a href="/aplicacion/practica3/index.php">Práctica 3</a></li> 
        <li><a href="/aplicacion/practica4/index.php">Práctica 4</a></li> 


        

    </ul>   
        <br><br>

        <h3 id="TituloCuerpo">Pruebas<h3>
    <ul>
       <li><a href="./aplicacion/pruebas/index.php">Acceso a pruebas</a></li>

    </ul>
    
<?php
}
