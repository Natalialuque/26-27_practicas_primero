<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
require_once(dirname(__FILE__) . "/../../scripts/clases/Punto.php");

//controlador

//barra de ubicacion logica que nos indica donde estamos
$ubicacion = [
    "pagina principal" => "../../index.php",
    "relacion 7" => "./index.php"

];

//Creamos tres puntos 
$puntos = [];

/**
 * Tres puntos que hemos creado para hacer pruebas del ejercicio  2
 */
    // $puntos[] = new Punto(100, 100, "rojo", 1);
    // $puntos[] = new Punto(200, 200, "negro", 2);
    // $puntos[] = new Punto(300, 300, "naranja", 3);


/**
 * CONTROLADOR
 */

//datos de nuestro formulario 
$datos = [
    "x" => 0,
    "y" => 0,
    "color" => "",
    "grosor" => ""
];

//errores
$errores = [];

/**
 * Para meter la ruta de la imagen
 */
$rutaImagen = "";

//Cargamos los puntos previamente guardados en el .dat, si existe
if (file_exists(obtenerRutaFichero())) {
    $puntos = cargarPuntos();
}



/**
 * HACEMOS LAS VERIFICACION CUANDO PULSAMOS EL BOTON GUARDAR
 * Usamos la clase de validacion para comprobar errores
 */
if (isset($_POST["guardar"])) {

    //VERIFICAMOS X --> que esten enrte 0 y 500 y no este vacio
    $x = "";

    if (isset($_POST["x"])) {

        $x = $_POST["x"];

        //verificamos que no este vacio
        if ($x === "") {

            $errores["x"] = "La x no puede estar vacía";

            // Comprobamos longitud máxima indicada en el ejercicio

        }
        // Comprobamos que sea un entero entre 0 y 500
        elseif (!validaEntero($x, 0, 500, 0)) {
            $errores["x"] = "La x debe estar entre 0 y 500";
        }
    }
    //guardamos el valor
    $datos["x"] = $x;

    //VERIFICAMOS Y --> lo mismo que x 
    $y = "";

    if (isset($_POST["y"])) {

        $y = $_POST["y"];

        //verificamos que no este vacio
        if ($y === "") {

            $errores["y"] = "La y no puede estar vacía";

            // Comprobamos longitud máxima indicada en el ejercicio

        }
        // Comprobamos que sea un entero entre 0 y 500
        elseif (!validaEntero($y, 0, 500, 0)) {

            $errores["y"] = "La y debe estar entre 0 y 500";
        }
    }
    //guardamos el valor
    $datos["y"] = $y;

    //VERIFICAMOS COLOR --> verificamos que hay un color selecionado
    $color = "";

    //le ponemos esto para que entre en la funcion
    $color = $_POST["color"] ?? "";

    // comprobamos que se haya seleccionado un color
    if (empty($color)) {
        $errores["color"] = "Debe seleccionar un color";
    }


    //guardamos el valor
    $datos["color"] = $color;


    //VERIFICAMOS GROSOR --> verificamos que se ha marcado un grosor 
    $grosor = "";

    //le ponemos esto para que entre en la funcion
    $grosor = $_POST["grosor"] ?? "";

    // comprobamos que se haya seleccionado un grosor
    if (empty($grosor)) {
        $errores["grosor"] = "Debe seleccionar un grosor";
    }


    //guardamos el valor
    $datos["grosor"] = $grosor;


    //creamos el objeto punto si no tenemos errores 
    if (empty($errores)) {
        $punto = new Punto(
            (int)$datos["x"],
            (int)$datos["y"],
            $datos["color"],
            (int)$datos["grosor"]
        );
        $puntos[] = $punto;
        guardarPuntos($puntos);
    }
    
    // Generamos la imagen solo si hay puntos que dibujar
    if (!empty($puntos)) {
        $rutaImagen = CrearImagen($puntos);
    }

    
}


/**
 * ELIMINAR 
 */

if (isset($_POST["eliminar"])) {

    $indice = $_POST["elimina"];

    // Si existe el punto seleccionado
    if (isset($puntos[$indice])) {

        // Lo borramos del array
        unset($puntos[$indice]);

        // Actualizamos el fichero .dat
        guardarPuntos($puntos);

        // Actualizamos la imagen
        $rutaImagen = CrearImagen($puntos);
    }
}


/**
 * DESCARGAR --> cuando pulsamos descargar se encargar de meter el nombre del archivo y de deolver la imagen
 */
if (isset($_POST["descargar"])) {
    header('Content-Type: image/jpg');
    header('Content-Disposition: attachment; filename="'. nombreArchivo() .'"');

    devuelveImagen($puntos);
    exit;
}

/**
 * SUBIR
 */
if (isset($_POST["subirArch"])) {
    procesarSubidaArchivo($puntos, $errores);
    if (!empty($puntos)) {
    $rutaImagen = CrearImagen($puntos);
}
}





//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION", $ubicacion);
cuerpo($errores, $datos, $puntos,$rutaImagen); //llamo a la vista
finCuerpo();
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////vista cabecera donde podemos ver otros enlaces 

function cabecera() {}
//vista
function cuerpo($errores, $datos, $puntos,$rutaImagen){

    formulario($errores, $datos);
    TextAreaPuntos($puntos);
    mostrarImagen($rutaImagen);
    formEliminar($puntos);
    descargaImg();
    subirArchivo($errores);

}




/**
 * FORMULARIO --> funcion donde vamos a crear un formulario que vamos a mostrar por pantalla para que el usuario introduzca los datos
 *
 * @return void
 */
function formulario(array $errores, array $datos)
{
?>
    <!-- Formulario en el que pedimos los valores -->
    <form action="" method="post">

        <fieldset>

            <legend>Nuevo punto</legend>

            <p>
                <label for="x">Coordenada X:</label>

                <input type="number" name="x" id="x" value="<?php echo $datos["x"] ?>">
                <br><br>
                <?php
                if (isset($errores["x"])) {
                    echo "<br><span class='error'>{$errores["x"]}</span>";
                }
                ?>
            </p>

            <p>
                <label for="y">Coordenada Y:</label>

                <input type="number" name="y" id="y" value="<?php echo $datos["y"] ?>">
                <br><br>
                <?php
                if (isset($errores["y"])) {
                    echo "<br><span class='error'>{$errores["y"]}</span>";
                }
                ?>
            </p>

            <p>

                <label for="color">
                    Color:
                </label>

                <select name="color" id="color">

                    <option value="">Selecciona un color</option>

                    <?php
                    foreach (Punto::COLORES as $clave => $infoColor) {
                        $selected = ($datos["color"] == $clave) ? "selected" : "";
                    ?>

                        <option value="<?php echo $clave ?>"
                            <?php echo $selected ?>>
                            <?php echo $infoColor["nombre"] ?>
                        </option>

                    <?php
                    }
                    ?>
                </select>
                <br><br>
                <?php
                if (isset($errores["color"])) {
                    echo "<br><span class='error'>{$errores["color"]}</span>";
                }
                ?>

            </p>

            <p>

                Grosor:

                <?php
                foreach (Punto::GROSORES as $id => $nombre) {
                    $checked = ($datos["grosor"] == $id) ? "checked" : "";
                ?>

                    <label>

                        <input type="radio" name="grosor" value="<?php echo $id ?>"
                            <?php echo $checked ?>>
                        <?php echo $nombre ?>

                    </label>

                <?php
                }
                ?>
                <br><br>
                <?php
                if (isset($errores["grosor"])) {
                    echo "<br><span class='error'>{$errores["grosor"]}</span>";
                }
                ?>

            </p>

            <p>
                <input type="submit" name="guardar" value="Guardar">
            </p>
        </fieldset>

    </form>

<?php
}

/**
 * EJERCICIO 2 --> 
 */

/**
 * FUNCION TEXT AREA --> Muestra los puntos guardados en un textarea de solo lectura
 *
 * @param array $puntos
 * @return void
 */
function TextAreaPuntos(array $puntos){
?>
    <fieldset>
        <legend>Puntos guardados</legend>
        <textarea rows="10" cols="50" readonly><?php
            foreach ($puntos as $punto) {
                echo $punto->getX() . "; "
                    . $punto->getY() . "; "
                    . $punto->getColor() . "; "
                    . $punto->getGrosor()
                    . PHP_EOL;
            }
        ?></textarea>
    </fieldset>
<?php
}

/**
 * FUNCION MOSTRAR IMAGEN --> Muestra la imagen con los puntos (solo si existe)
 *
 * @param string $rutaImagen
 * @return void
 */
function mostrarImagen(string $rutaImagen){
    if ($rutaImagen !== "") {
?>
        <fieldset>
            <legend>Imagen</legend>
            <img src="<?= $rutaImagen ?>" alt="puntos">
        </fieldset>
<?php
    }
}


/**
 *  FUNCION ARCHIVO -->  funcion que saca el nombre del navegador que se esta usando
 *
 * @return string
 */
function nombreArchivo(): string{
    $ip = str_replace(".", "_", $_SERVER['REMOTE_ADDR']);

    $agente = $_SERVER['HTTP_USER_AGENT'];

    $navegador = "desconocido";

    if (strpos($agente, 'Chrome') !== false &&
        strpos($agente, 'Edg') === false) {

        $navegador = "chrome";

    } elseif (strpos($agente, 'Firefox') !== false) {

        $navegador = "firefox";

    } elseif (strpos($agente, 'Safari') !== false &&
              strpos($agente, 'Chrome') === false) {

        $navegador = "safari";

    } elseif (strpos($agente, 'Edg') !== false) {

        $navegador = "edge";
    }

    return $ip . "_" . $navegador;
}


/**
 * FUNCION CREAR IMAGEN --> Esta funcion es la que se encarga de crear la imagen con el fondo blanco para mostrar los puntos
 *
 * @param array $puntos
 * @return string
 */
function CrearImagen(array $puntos): string{
    // Carpeta física donde se guardan las imágenes
    $carpeta = dirname(__FILE__) . "/imagenes";

    // Si no existe la carpeta, la creamos
    if (!is_dir($carpeta)) {
        mkdir($carpeta, 0777, true);
    }

    // Nombre del archivo único por cliente
    $nombreArchivo = "puntos_" . nombreArchivo() . ".jpg";

    // Ruta física (para guardar con GD)
    $rutaFisica = $carpeta . "/" . $nombreArchivo;

    // Creamos un lienzo de 500x500 píxeles
    $imagen = imagecreatetruecolor(500, 500);

    $blanco = imagecolorallocate($imagen, 255, 255, 255);
    $negro  = imagecolorallocate($imagen, 0, 0, 0);

    imagefill($imagen, 0, 0, $blanco);

    foreach ($puntos as $punto) {

        $rgb = Punto::COLORES[$punto->getColor()]["rgb"];

        $color = imagecolorallocate($imagen, $rgb[0], $rgb[1], $rgb[2]);

        // fino = 4px, medio = 8px, grueso = 12px
        $diametro = $punto->getGrosor() * 4;

        imagefilledellipse(
            $imagen,
            $punto->getX(),
            $punto->getY(),
            $diametro,
            $diametro,
            $color
        );
    }

    // Borde negro
    imagerectangle($imagen, 0, 0, 499, 499, $negro);

    // Guardamos la imagen
    imagejpeg($imagen, $rutaFisica);

    imagedestroy($imagen);

    // Devolvemos la ruta WEB relativa al index.php actual
    return "imagenes/" . $nombreArchivo . "?v=" . time();
}

/**
 * 
 * EJERCICIO 3 --> 
 * 
 */

//FUNCION OBTENER RUTA --> Se encarga de sacar la ruta del fichero .dat 
function obtenerRutaFichero(): string{
    return dirname(__FILE__) .
           "/datos/puntos_" .
           nombreArchivo() .
           ".dat";
}


/**
 * FUNCION CARGAR PUNTOS --> Carga los puntos en la ruta del .dat
 *
 * @return array
 */
function cargarPuntos(): array
{
    // array donde guardaremos los objetos Punto
    $puntos = [];

    // obtenemos la ruta del fichero
    $ruta = obtenerRutaFichero();

    // si el fichero no existe devolvemos array vacío
    if (!file_exists($ruta)) {
        return $puntos;
    }

    // leemos el fichero línea a línea
    $lineas = file($ruta);

    foreach ($lineas as $linea) {

        // eliminamos saltos de línea
        $linea = trim($linea);

        // evitamos líneas vacías
        if ($linea === "") {
            continue;
        }

        // separamos por ;
        $datos = explode(";", $linea);

        // creamos el objeto Punto
        $punto = new Punto(
            (int)$datos[0],
            (int)$datos[1],
            $datos[2],
            (int)$datos[3]
        );

        // lo añadimos al array
        $puntos[] = $punto;
    }

    return $puntos;
}

/**
 * FUNCION GUARDAR PUNTO S--> Guarda todos los puntos en el fichero .dat
 *
 * @param array $puntos
 * @return void
 */
function guardarPuntos(array $puntos): void{

    // Obtenemos la ruta del fichero donde se guardan los puntos
    $ruta = obtenerRutaFichero();

    // Abrimos el fichero en modo "w" (escritura):
    // - si no existe, lo crea
    // - si existe, borra todo su contenido y empieza desde cero
    // Por eso después hay que escribir TODOS los puntos, no solo el nuevo
    $fichero = fopen($ruta, "w");

    // Recorremos todos los puntos del array
    foreach ($puntos as $punto) {

        // Construimos la línea con los datos del punto separados por ";"
        $linea =
            $punto->getX() . ";" .
            $punto->getY() . ";" .
            $punto->getColor() . ";" .
            $punto->getGrosor() .
            PHP_EOL;

        // Escribimos la línea en el fichero
        fputs($fichero, $linea);
    }

    // Cerramos el fichero 
    fclose($fichero);
}


/**
 * 
 * EJERCICIO 4 --> 
 *   
 */

/**
 * FUNCION FORMULARIO BORRAR --> Se encarga de crear un combo con todos los puntos guardados en el fichero . dat con un boton de eliminar que se encarga de cargarselos 
 *
 * @param $puntos
 * @return void
 */
function formEliminar($puntos){
?>
    <h2>Eliminar punto</h2>

    <form action="" method="post">

        <label for="elimina">Selecciona el punto:</label>

        <select name="elimina" id="elimina">

            <?php
            foreach ($puntos as $clave => $punto) {
            ?>
                <option value="<?= $clave ?>">
                    <?= $punto->getX() ?>;
                    <?= $punto->getY() ?>;
                    <?= $punto->getColor() ?>;
                    <?= $punto->getGrosor() ?>
                </option>
            <?php
            }
            ?>

        </select>

        <input type="submit" name="eliminar" value="Eliminar">

    </form>
<?php
}

/**
 * 
 * EJERCICIO 5 -->
 * 
 */

/**
 * FUNCION DESCARGAR --> Formulario en el que creamos un boton de descargar, el cual nos descargara la iamagen de puntos
 */

function descargaImg(){
?>
    <h2>Descargar Imagen</h2>

    <form action="" method="post">
        <input type="submit" value="Descargar" name="descargar">
    </form>
<?php
}

/**
 * FUNCION DEVUELVE IMAGEN --> hace lo mismo que la de crear, pero pasandole solo el array 
 *
 * @param array $puntos
 * @return void
 */
function devuelveImagen(array $puntos): void{
    $imagen = imagecreatetruecolor(500, 500);

    $blanco = imagecolorallocate($imagen, 255, 255, 255);
    $negro = imagecolorallocate($imagen, 0, 0, 0);

    imagefill($imagen, 0, 0, $blanco);

    // marco
    imagerectangle($imagen, 0, 0, 499, 499, $negro);

    foreach ($puntos as $punto) {

        $rgb = Punto::COLORES[$punto->getColor()]["rgb"];

        $color = imagecolorallocate(
            $imagen,
            $rgb[0],
            $rgb[1],
            $rgb[2]
        );

        imagefilledellipse(
            $imagen,
            $punto->getX(),
            $punto->getY(),
            $punto->getGrosor() * 4,
            $punto->getGrosor() * 4,
            $color
        );
    }

     // Borde negro
    imagerectangle($imagen, 0, 0, 499, 499, $negro);

    imagejpeg($imagen);
    imagedestroy($imagen);
}

/**
 * 
 * EJERCICIO 6 --> 
 * 
 */
/**
 * Undocumented function
 *
 * @param [type] $errores
 * @return void
 */
function subirArchivo($errores) {
    ?>
    <h2>Subir archivo puntos</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="archivo" id="archivo">
        <input type="submit" value="Subir Archivo" name="subirArch">
    </form>
    <?php if (!empty($errores["subirArch"])) { ?>
            <?php foreach ($errores["subirArch"] as $mensaje) { ?>
                <p style="color: red;"><?= $mensaje ?></p>
            <?php } ?>
        <?php } ?>
    <?php 
}


/**
 * Procesa la subida de un fichero txt con puntos.
 *
 * @param array $puntos   Array actual de objetos Punto.
 * @param array $errores  Array donde guardar errores.
 */
function procesarSubidaArchivo(array &$puntos, array &$errores): void{
    // Comprobar que se ha subido un archivo
    if (!isset($_FILES["archivo"])) {
        $errores["subirArch"][] = "No se ha recibido ningún archivo";
        return;
    }

    // Comprobar errores de subida
    if ($_FILES["archivo"]["error"] !== UPLOAD_ERR_OK) {
        $errores["subirArch"][] = "Error al subir el archivo";
        return;
    }

    // Comprobar extensión
    $extension = strtolower(
        pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION)
    );

    if ($extension !== "txt") {
        $errores["subirArch"][] = "El archivo debe ser un TXT";
        return;
    }

    // Leer todas las líneas del fichero
    $lineas = file($_FILES["archivo"]["tmp_name"]);

    if ($lineas === false) {
        $errores["subirArch"][] = "No se ha podido leer el archivo";
        return;
    }

    // Recorrer línea a línea
    foreach ($lineas as $linea) {

        // Eliminar espacios y saltos de línea
        $linea = trim($linea);

        // Si la línea está vacía la ignoramos
        if ($linea === "") {
            continue;
        }

        // Separar campos
        $datos = explode(";", $linea);

        // Debe haber exactamente 4 datos
        if (count($datos) != 4) {
            continue;
        }

        // Obtener valores
        $x = trim($datos[0]);
        $y = trim($datos[1]);
        $color = trim($datos[2]);
        $grosor = trim($datos[3]);

        try {

            // Crear el objeto Punto
            $nuevoPunto = new Punto(
                (int)$x,
                (int)$y,
                $color,
                (int)$grosor
            );

            // Añadir al array de puntos
            $puntos[] = $nuevoPunto;

        } catch (Exception $e) {

            // Si el punto es incorrecto se ignora
            continue;
        }
    }

    // Guardar todos los puntos en el fichero .dat
    guardarPuntos($puntos);

    // Regenerar la imagen con los puntos actuales
    CrearImagen($puntos);
}
?>