<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
require_once(dirname(__FILE__) . "/../../scripts/clases/Punto.php");

//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
//barra de ubicacion logica que nos indica donde estamos
 $ubicacion = [
 "pagina principal"=> "../../index.php",
 "relacion 7"=> "./index.php"

];

//CONTROLADOR

$datos = [
    "x" => "",
    "y" => "",
    "color" => "",
    "grosor" => ""
];
$errores = [];


cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION",$ubicacion);
cuerpo($errores,$datos); //llamo a la vista
finCuerpo();
// **********************************************************
////vista cabecera donde podemos ver otros enlaces 

function cabecera() {}
//vista
function cuerpo($errores,$datos)
{

formulario( $errores,$datos);


}




/**
 * FORMULARIO --> funcion donde vamos a crear un formulario que vamos a mostrar por pantalla 
 *
 * @return void
 */
function formulario(array $errores, array $datos)
{
    // esto se encarga de los errores
    if (!empty($errores)) {
        echo "<div class='error'>";

        foreach ($errores as $listaErrores) {
            foreach ($listaErrores as $error) {
                echo "$error<br>";
            }
        }

        echo "</div>";
    }
?>
<form action="" method="post">

    <fieldset>

        <legend>Nuevo punto</legend>

        <p>
            <label for="x">Coordenada X:</label>

            <input
                type="number"
                name="x"
                id="x"
                min="0"
                max="500"
                value="<?= $datos["x"] ?>"
            >
        </p>

        <p>
            <label for="y">Coordenada Y:</label>

            <input
                type="number"
                name="y"
                id="y"
                min="0"
                max="500"
                value="<?= $datos["y"] ?>"
            >
        </p>

        <p>

            <label for="color">
                Color:
            </label>

            <select name="color" id="color">

                <option value="">
                    Selecciona un color
                </option>

                <?php
                foreach (Punto::COLORES as $clave => $infoColor)
                {
                    $selected = ($datos["color"] == $clave) ? "selected" : "";
                    ?>

                    <option
                        value="<?= $clave ?>"
                        <?= $selected ?>
                    >
                        <?= $infoColor["nombre"] ?>
                    </option>

                    <?php
                }
                ?>

            </select>

        </p>

        <p>

            Grosor:

            <?php
            foreach (Punto::GROSORES as $id => $nombre)
            {
                $checked = ($datos["grosor"] == $id) ? "checked" : "";
                ?>

                <label>

                    <input
                        type="radio"
                        name="grosor"
                        value="<?= $id ?>"
                        <?= $checked ?>
                    >

                    <?= $nombre ?>

                </label>

                <?php
            }
            ?>

        </p>

        <p>

            <input
                type="submit"
                name="guardar"
                value="Guardar"
            >

        </p>

    </fieldset>

</form>

<?php
}