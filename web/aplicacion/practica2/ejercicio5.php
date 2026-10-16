<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
//barra de ubicacion logica que nos indica donde estamos
 $ubicacion = [
 "pagina principal"=> "../../index.php",
 "relacion 2"=> "./index.php",
 "Ejercicio 5"=>"ejercicio5.php"

 ];

 //CONTROLADOR 
 // Cadena multilínea con HEREDOC
$cadena = <<<FIN
    <h3>Hola estoy usando heredoc</h3>
    <p>Esto es un texto normal, mi correo es ncabluq878@g.educaand.es</p>
    <pre>123 123 213 321 532u849</pre>
    FIN;

$devuelto = [];


cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION",$ubicacion);
cuerpo($cadena); //llamo a la vista
finCuerpo();
// **********************************************************
////vista cabecera donde podemos ver otros enlaces 

function cabecera() {}
//vista
function cuerpo($cadena)
{
?>

    <h2>Definiendo expresiones regulares</h2>
    <h4>Texto: <?= $cadena ?></p><br>

    <p><strong>Mail Encontrados: </strong><br>
        <?php
        $patronCorreo = "/[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]{2,}/";

        // Busca todas las coincidencias del patrón dentro de la cadena
        $ret = preg_match_all($patronCorreo, $cadena, $devuelto, PREG_OFFSET_CAPTURE);

        if ($ret > 0){
                //aqui vamos devolviendo en que posicion estan las coincidencias 
                foreach ($devuelto[0] as $mail){
                    echo $mail[0] . ", en la posición " . $mail[1] . "<br>";
                }
        }
        else{
            echo "No se encontraron correos";
        }

        $devuelto = [];
        ?>
    </p>

    <p><strong>Etiquetas encontradas: </strong><br>
        <?php
        $patronEtiquetas = "/<\/?[a-zA-Z0-9]+[^>]*>/";

        // Busca todas las coincidencias del patrón dentro de la cadena
        $ret = preg_match_all($patronEtiquetas, $cadena, $devuelto, PREG_OFFSET_CAPTURE);
        
        if ($ret > 0){
            //aqui vamos devolviendo en que posicion estan las coincidencias 
            foreach ($devuelto[0] as $et){
                echo htmlspecialchars($et[0]) .", en la posición " .$et[1] ."<br>";
            }
        }else{
            echo "No se encontraron etiquetas";
        }

        $devuelto = [];
        ?>
    </p>

    <p><strong>Números encontrados: </strong><br>
        <?php
        $patronNumeros = "/[0-9]{1,}/";

        //Busca todas las coincidencias del patrón dentro de la cadena
        $ret = preg_match_all($patronNumeros, $cadena, $devuelto, PREG_OFFSET_CAPTURE);

        if ($ret > 0){
            //aqui vamos devolviendo en que posicion estan las coincidencias 
            foreach ($devuelto[0] as $num){
                echo $num[0] .", en la posición " .$num[1] ."<br>";
            }
        }else{
                echo "No se encontraron números";
        }

        $devuelto = [];
        ?>
    </p>
<?php

}
