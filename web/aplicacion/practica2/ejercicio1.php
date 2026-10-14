<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
//barra de ubicacion logica que nos indica donde estamos
 $ubicacion = [
 "pagina principal"=> "../../index.php",
 "relacion 2"=> "./index.php",
 "Ejercicio 1"=>"ejercicio1.php"

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
    <?php
    // Variable que utilizaremos para comprobar
    // cuándo se interpreta y cuándo no
    $nombre = "Natalia";

    // CADENA CON COMILLAS DOBLES

    echo "<h2>Cadena con comillas dobles</h2>";

    /*
     * Las comillas dobles interpretan:
     * - Variables
     * - Caracteres de escape como \n
     */

    $cadena1 = "Hola $nombre\n" .
               "Caracteres especiales: á é ñ\n" .
               "Comilla simple: '\n" .
               "Comilla doble: \"\n" .
               "Variable: $nombre\n" .
               "Etiqueta HTML: <h1>Hola Natalia</h1>";

    // htmlspecialchars evita que se ejecute HTML
    // nl2br convierte los \n en <br>
    echo nl2br(htmlspecialchars($cadena1));

    echo "<br>";


    // CADENA CON COMILLAS SIMPLES

    echo "<h2>Cadena con comillas simples</h2>";

    /*
     * Las comillas simples NO interpretan:
     * - Variables
     * - Caracteres especiales como \n
     *
     * Por eso concatenamos "\n" usando
     * comillas dobles para crear los saltos.
     */

    $cadena2 = 'Hola $nombre' . "\n" .
               'Caracteres especiales: á é ñ' . "\n" .
               'Comilla simple: \'' . "\n" .
               'Comilla doble: "' . "\n" .
               'Variable: $nombre' . "\n" .
               'Etiqueta HTML: <h1>Hola Natalia</h1>';

    echo nl2br(htmlspecialchars($cadena2));

    echo "<br>";


    // CADENA HEREDOC

    echo "<h2>Cadena HEREDOC</h2>";

    /*
     * HEREDOC funciona igual que
     * las comillas dobles.
     *
     * Interpreta variables.
     */

    $cadena3 = <<<FIN
                Hola $nombre
                Caracteres especiales: á é ñ
                Comilla simple: '
                Comilla doble: "
                Variable:$nombre
                Etiqueta HTML: <h2>Hola Mundo</h2>
            FIN;

    echo nl2br(htmlspecialchars($cadena3));

    echo "<br>";


    // CADENA NOWDOC

    echo "<h2>Cadena NOWDOC</h2>";

    /*
     * NOWDOC funciona igual que
     * las comillas simples.
     *
     * NO interpreta variables.
     */

    $cadena4 = <<<'FIN'
                Hola $nombre
                Caracteres especiales:á é ñ
                Comilla simple: '
                Comilla doble: "
                Variable:$nombre
                Etiqueta HTML:
                <h2>Hola Mundo</h2>
                FIN;

    echo nl2br(htmlspecialchars($cadena4));

    echo "<br>";


    // CONCLUSIONES
    
    echo "<h2>Conclusiones</h2>";

    echo "<ul>";

    echo "<li>Las comillas dobles interpretan variables y caracteres especiales.</li>";

    echo "<li>Las comillas simples no interpretan variables ni caracteres especiales.</li>";

    echo "<li>HEREDOC funciona como las comillas dobles.</li>";

    echo "<li>NOWDOC funciona como las comillas simples.</li>";
}