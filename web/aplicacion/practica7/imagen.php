<?php

require_once(dirname(__FILE__) . "/../../scripts/clases/Punto.php");

/**
 * TENGO QUE VOLVER A LLAMAR A ALGUNAS FUNCIONES YA CREADAS EN INDEX.PHP PARA PODER HACER LAS DESCARGA
 */

/**
 * Llamamos al nombre archivo para sacar el archivo 
 *
 * @return string
 */
function nombreArchivo(): string{
    $ip = str_replace(".", "_", $_SERVER["REMOTE_ADDR"]);

    $agente = $_SERVER["HTTP_USER_AGENT"];

    $navegador = "desconocido";

    if (
        strpos($agente, "Chrome") !== false &&
        strpos($agente, "Edg") === false
    ) {
        $navegador = "chrome";
    } elseif (strpos($agente, "Firefox") !== false) {
        $navegador = "firefox";
    } elseif (
        strpos($agente, "Safari") !== false &&
        strpos($agente, "Chrome") === false
    ) {
        $navegador = "safari";
    } elseif (strpos($agente, "Edg") !== false) {
        $navegador = "edge";
    }

    return $ip . "_" . $navegador;
}

/**
 * obtenermos ruta del fichero
 *
 * @return string
 */
function obtenerRutaFichero(): string{
    return dirname(__FILE__) .
           "/datos/puntos_" .
           nombreArchivo() .
           ".dat";
}


/**
 * Cargamos todos los puntos 
 *
 * @return array
 */
function cargarPuntos(): array
{
    $puntos = [];

    $ruta = obtenerRutaFichero();

    if (!file_exists($ruta)) {
        return $puntos;
    }

    $lineas = file($ruta);

    foreach ($lineas as $linea) {

        $linea = trim($linea);

        if ($linea === "") {
            continue;
        }

        $datos = explode(";", $linea);

        $puntos[] = new Punto(
            (int)$datos[0],
            (int)$datos[1],
            trim($datos[2]),
            (int)$datos[3]
        );
    }

    return $puntos;
}


/**
 * AQUI --> empezamos con la preparacion de la imagen y la posterior descarga 
 */

// Cargamos los puntos desde el DAT
$puntos = cargarPuntos();


// Creamos lienzo de 500x500
$imagen = imagecreatetruecolor(500, 500);

// Colores básicos
$blanco = imagecolorallocate($imagen, 255, 255, 255);
$negro  = imagecolorallocate($imagen, 0, 0, 0);

// Fondo blanco
imagefill($imagen, 0, 0, $blanco);

// Marco negro
imagerectangle(
    $imagen,
    0,
    0,
    499,
    499,
    $negro
);


// Recorremos todos los puntos
foreach ($puntos as $punto) {

    // Recuperamos RGB del color
    $rgb = Punto::COLORES[$punto->getColor()]["rgb"];

    // Creamos color GD
    $color = imagecolorallocate(
        $imagen,
        $rgb[0],
        $rgb[1],
        $rgb[2]
    );

    // Calculamos diámetro
    $diametro = $punto->getGrosor() * 4;

    // Dibujamos el punto
    imagefilledellipse(
        $imagen,
        $punto->getX(),
        $punto->getY(),
        $diametro,
        $diametro,
        $color
    );
}


// Cabeceras para descargar
header("Content-Type: image/jpg");

header(
    'Content-Disposition: attachment; filename="puntos_' .
    nombreArchivo() .
    '.jpg"'
);


// Enviamos el JPG al navegador
imagejpeg($imagen);

// Liberamos memoria
imagedestroy($imagen);

exit;