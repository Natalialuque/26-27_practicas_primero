<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

//cuando cargue este fichero, la respuesta del servidor sea recargar pero con iespedroespinosa
// header("location: https.www.iespedroespinosa.es");
// exit;

//que a los tres segundos se recargue hacia iespedroespinosa
// header("refresh: 3; url=https.www.iespedroespinosa.es");



//en variables superglobales: 
//en $_REQUEST el resumen de lo que hayamos enviado por get y por post
//cuando usamos get en el formulario, se ponen los datos en la url, no hay tanta privacidad y no podría enviar un vídeo o foto
//cuando usamos post y get a la vez, en el request sale la última

//inicializaciones 
$datos = [
    "nombre" => "Natalia",
    "precio" => 12
];
$errores = [];

//comprobar si se ha dado a insertar 
if (isset($_POST["crear"])) {
    $nombre = "";

    if (isset($_POST["nombre"])) {
        $nombre = $_POST["nombre"];
        $nombre = mb_strtolower(mb_trim($nombre));
    }
    if ($nombre == "")
        $errores["nombre"][] = "Debe indicarse un nombre";

    if (mb_strlen($nombre) > 20)
        $errores["nombre"][] = "El nombre no puede tener mas de 30 
                                caracteres";

    $datos["nombre"] = $nombre;

    //verifico precio

    $precio = 0;
    if (isset($_POST["precio"])) {
        $precio = floatval($_POST["precio"]);
    }

    if ($precio <= 0) {
        $errores["precio"][] = "Debe indicarse un precio";
        $precio = 10;
    }
        

    $datos["precio"] = $precio;


    if (!$errores)  //no hay errores hago la insercion 
    {
        //codigo para el nuevo articulo 
        $codigo = 1; //codigo 

        //se guarda el articulo 

        //ir a ver el articulo insertado 
        header("location: verArticulo.php?id=$codigo");
        exit;
    }
}

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION");
cuerpo($datos, $errores); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {}
//vista
function cuerpo(array $datos, array $errores)
{
?>

    <?php

    ?>
    <br>
    <br>
    <br>

<?php
    formulario($datos, $errores);
}

function formulario(array $datos, array $errores)
{
    if ($errores) {   //mostrar los errores 
        echo "<div class='error'>";
        foreach ($errores as $clave => $valor) {
            foreach ($valor as $error)
                echo "$clave => $error<br>" . PHP_EOL;
        }
        echo "</div>";
    }

?>
    <form action="" method="post">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre"
            value="<?php echo $datos["nombre"]; ?>" size=21
            maxlength="20"><br>
        <label for="precio">Precio: </label>
        <input type="text" name="precio" id="precio"
            value="<?php echo $datos["precio"]; ?>" size=4
            maxlength="3"><br>
        <input type="submit" class="boton" value="Crear" name="crear">
    </form>
<?php
}