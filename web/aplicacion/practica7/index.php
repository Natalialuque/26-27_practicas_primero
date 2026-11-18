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
 * HACEMOS LAS VERIFICACION CUANDO PULSAMOS EL BOTON GUARDAR
 * Usamos la clase de validacion para comprobar errores
 */
if (isset($_POST["guardar"])) {

    //VERIFICAMOS X --> que esten enrte 0 y 500 y no este vacio
    $x = "";

    if(isset($_POST["x"])){

        $x = $_POST["x"];

        //verificamos que no este vacio
        if ($x === "") {

            $errores["x"] = "La x no puede estar vacía";

        // Comprobamos longitud máxima indicada en el ejercicio
        
        }
        // Comprobamos que sea un entero entre 0 y 500
         elseif (!validaEntero($x,0,500,0)) {
            $errores["x"] ="La x debe estar entre 0 y 500";
        }

    }
    //guardamos el valor
    $datos["x"]= $x;

    //VERIFICAMOS Y --> lo mismo que x 
    $y = "";

    if(isset($_POST["y"])){

        $y = $_POST["y"];

        //verificamos que no este vacio
        if ($y === "") {

            $errores["y"] = "La y no puede estar vacía";

        // Comprobamos longitud máxima indicada en el ejercicio
        
        }
        // Comprobamos que sea un entero entre 0 y 500
         elseif (!validaEntero($y,0,500,0)) {

            $errores["y"] ="La y debe estar entre 0 y 500";
        }

    }
    //guardamos el valor
    $datos["y"]= $y;

    //VERIFICAMOS COLOR --> verificamos que hay un color selecionado
    $color = "";

    //le ponemos esto para que entre en la funcion
    $color = $_POST["color"] ?? "";

        // comprobamos que se haya seleccionado un color
        if (empty($color)) {
            $errores["color"] = "Debe seleccionar un color";
        }

    
    //guardamos el valor
    $datos["color"]= $color;


    //VERIFICAMOS GROSOR --> verificamos que se ha marcado un grosor 
    $grosor = "";

     //le ponemos esto para que entre en la funcion
    $grosor = $_POST["grosor"] ?? "";

        // comprobamos que se haya seleccionado un grosor
        if (empty($grosor)) {
            $errores["grosor"] = "Debe seleccionar un grosor";
        }


    //guardamos el valor
    $datos["grosor"]= $grosor;


    //creamos el objeto punto si no tenemos errores 
   if (empty($errores)){
    $punto = new Punto(
        (int)$datos["x"],
        (int)$datos["y"],
        $datos["color"],
        (int)$datos["grosor"]
    );
}


}

cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION",$ubicacion);
cuerpo($errores,$datos); //llamo a la vista
finCuerpo();
// **********************************************************
////vista cabecera donde podemos ver otros enlaces 

function cabecera() {}
//vista
function cuerpo($errores,$datos){

formulario( $errores,$datos);


}




/**
 * FORMULARIO --> funcion donde vamos a crear un formulario que vamos a mostrar por pantalla para que el usuario introduzca los datos
 *
 * @return void
 */
function formulario(array $errores, array $datos){
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
                if(isset($errores["x"])){
                    echo "<br><span class='error'>{$errores["x"]}</span>";
                }
            ?>
        </p>

        <p>
            <label for="y">Coordenada Y:</label>

            <input type="number" name="y" id="y" value="<?php echo $datos["y"] ?>">
            <br><br>
            <?php
                if(isset($errores["y"])){
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
                foreach (Punto::COLORES as $clave => $infoColor){
                    $selected = ($datos["color"] == $clave) ? "selected" : "";
                    ?>

                    <option value="<?php echo $clave ?>"
                        <?php echo $selected ?> >
                        <?php echo $infoColor["nombre"] ?>
                    </option>

                    <?php
                }
                ?>
            </select>
            <br><br>
            <?php
                if(isset($errores["color"])){
                    echo "<br><span class='error'>{$errores["color"]}</span>";
                }
            ?>

        </p>

        <p>

            Grosor:

            <?php
            foreach (Punto::GROSORES as $id => $nombre)
            {
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
                if(isset($errores["grosor"])){
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