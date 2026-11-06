<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
require_once(dirname(__FILE__) . "/../../scripts/librerias/validacion.php");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
//barra de ubicacion logica que nos indica donde estamos
$ubicacion = [
    "pagina principal" => "../../index.php",
    "relacion 5" => "./index.php",
    "Ejercicio 2" => "ejercicio 2"

];

//controlador
$valores = [
    "nombre" => "",
    "password" => "",
    "fecha_nacimiento" => "",
    "fecha_carnet" => [
        "dia" => "",
        "mes" => "",
        "anio" => ""
    ],
    "hora_levantarse" => "",
    "estado" => "", // clave para los checkboxes de estudios
    "estudios" => [],
    "hermanos" => 0, // clave para los checkboxes de estudios
    "sueldo" => 1100 // clave para los checkboxes de estudios
];

$errores = [];

/**
 * HACEMOS LAS VERIFICACION CUANDO PULSAMOS EL BOTON CREAR
 * Usamos la clase de validacion para dar errores  
 */
if (isset($_POST["crear"])) {

    /**
     * NOMBRE
     */

    // Variable donde almacenaremos el nombre enviado por el usuario
    $nombre = "";

    // Valor por defecto que utilizará la función de validación
    $defectoNombre = "NOMBRE_INVALIDO";

    // Comprobamos que el campo nombre ha llegado por POST
    if (isset($_POST["nombre"])) {

        // Eliminamos espacios al principio y al final y convertimos el texto a mayúsculas
        $nombre = mb_strtoupper(trim($_POST["nombre"]));

        // Comprobamos que el nombre no está vacío
        if ($nombre === "") {

            $errores["nombre"][] = "El nombre no puede estar vacío";

        // Comprobamos que la longitud máxima sea 25 caracteres
        } elseif (!validaCadena($nombre, 25, $defectoNombre)) {

            $errores["nombre"][] = "El nombre debe tener como máximo 25 caracteres";

        // Comprobamos que el nombre NO comience por H
        } elseif (!validaExpresion($nombre, '/^[^H]/', $defectoNombre)) {

            $errores["nombre"][] = "El nombre no puede empezar por H";
        }
    }

    // Guardamos el valor 
    $datos["nombre"] = $nombre;

    /**
     * CONTRASEÑA
     */

}

cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION", $ubicacion);
cuerpo($valores, $errores); //llamo a la vista
finCuerpo();
// **********************************************************
////vista cabecera donde podemos ver otros enlaces 

function cabecera() {}
//vista
function cuerpo($valores, $errores)
{
?>

<?php

    //if (empty($errores) && isset($_POST["crear"])) {
    //resumen($datos);
    //} else {
    formulario($valores, $errores);
    //}
}

/**
 *  FUNCION DONDE VAMOS A CREAR EL FORMULARIO
 *
 * @param [type] $datos
 * @param [type] $errores
 * @return void
 */
function formulario($valores, $errores)
{
    /**Esto es para los errores y no estar repitiendolo constantemente  */
    if (!empty($errores)) {
        echo "<div class='error'>";
        foreach ($errores as $clave => $error) {
            echo "$clave => $error<br>";
        }
        echo "</div>";
    }
?>
 <h1 id="TituloCuerpo">FORUMALARIO</h1>

    <!--Aqui vamos a crear el formulario-->
    <form action="" method="post">

            <!-- NOMBRE -->
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre"
                value="<?php echo $valores['nombre']; ?>"
                size="25">
            <br><br>

            <!-- PASSWORD -->
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password"
                value="<?php echo $valores['password']; ?>"
                size="15">
            <br><br>

            <!-- FECHA_NACIMIENTO -->
            <label for="fecha_nacimiento">Fecha de nacimiento:</label>
            <input type="text" name="fecha_nacimiento" id="fecha_nacimiento"
                value="<?php echo $valores['fecha_nacimiento']; ?>"
                placeholder="dd/mm/aaaa">
            <br><br>

            <!-- FECHA_CARNET -->
            <label for="fecha_carnet">Fecha carnet:</label><br>

            <label>Día:</label>
            <input type="number" name="fecha_carnet[dia]"
                value="<?php echo $valores['fecha_carnet']['dia']; ?>"
                min="1" max="31">

            <label>Mes:</label>
            <input type="number" name="fecha_carnet[mes]"
                value="<?php echo $valores['fecha_carnet']['mes']; ?>"
                min="1" max="12">

            <label>Año:</label>
            <input type="number" name="fecha_carnet[anio]"
                value="<?php echo $valores['fecha_carnet']['anio']; ?>"
                min="1900" max="<?php echo date('Y'); ?>">

            <br><br>

            <!-- HORA LEVANTARSE-->
            <label for="hora_levantarse">Hora de levantarse:</label>
            <input type="text" name="hora_levantarse" id="hora_levantarse"
                value="<?php echo $valores['hora_levantarse']; ?>"
                placeholder="hh:mm:ss">
            <br><br>

            <!-- ESTADO -->
            <label for="estado">Estado:</label>
            <br>
            <input type="radio" name="estado" id="estudiante" value="1"
                <?php if ($valores['estado'] == 1) echo "checked"; ?>>
            <label for="estudiante">Estudiante</label><br>

            <input type="radio" name="estado" id="paro" value="2"
                <?php if ($valores['estado'] == 2) echo "checked"; ?>>
            <label for="paro">En paro</label><br>

            <input type="radio" name="estado" id="trabajando" value="3"
                <?php if ($valores['estado'] == 3) echo "checked"; ?>>
            <label for="trabajando">Trabajando</label><br>

            <input type="radio" name="estado" id="jubilado" value="4"
                <?php if ($valores['estado'] == 4) echo "checked"; ?>>
            <label for="jubilado">Jubilado</label><br>

            <!-- Opción incorrecta para probar validación -->
            <input type="radio" name="estado" id="incorrecta" value="5"
                <?php if ($valores['estado'] == 5) echo "checked"; ?>>
            <label for="incorrecta">Incorrecta</label>
            <br><br>

            <!-- ESTUDIOS -->
            <label>Estudios:</label>
            <br>

            <input type="checkbox" name="estudios[]" value="0"
                <?php if (in_array(0, $valores['estudios'])) echo "checked"; ?>>
            <label for="sinEstudios">Sin estudios</label>
            <br>
            <input type="checkbox" name="estudios[]" value="1"
                <?php if (in_array(1, $valores['estudios'])) echo "checked"; ?>>
            <label for="primaria">Primaria</label>
            <br>
            <input type="checkbox" name="estudios[]" value="2"
                <?php if (in_array(2, $valores['estudios'])) echo "checked"; ?>>
            <label for="Secundaria">Secundaria</label>
            <br>
            <input type="checkbox" name="estudios[]" value="3"
                <?php if (in_array(3, $valores['estudios'])) echo "checked"; ?>>
            <label for="Bachiller">Bachiller</label>
            <br>
            <input type="checkbox" name="estudios[]" value="4"
                <?php if (in_array(4, $valores['estudios'])) echo "checked"; ?>>
            <label for="cicloFormativo">Ciclo Formativo</label>
            <br>
            <input type="checkbox" name="estudios[]" value="5"
                <?php if (in_array(5, $valores['estudios'])) echo "checked"; ?>>
            <label for="universitarios">Universitarios</label>
            <br>

            <!-- opción incorrecta -->
            <input type="checkbox" name="estudios[]" value="6"
                <?php if (in_array(6, $valores['estudios'])) echo "checked"; ?>>
            <label for="universitarios">Incorrecta</label>
            <br><br>

            <!-- HERMANOS -->
            <label for="hermanos">Número de hermanos: </label>
            <input type="number" name="hermanos" id="hermanos"
                value="<?php echo $valores["hermanos"]; ?>" min="0" max="20">
                
            <br><br>
            <!-- SUELDO -->
            <label for="sueldo">sueldo (€): </label>
            <input type="number" name="sueldo" id="sueldo"
                value="<?php echo $valores["sueldo"]; ?>" step="0.01" min="1000" max="150000">
            <br><br>


            <!-- BOTON  -->
            <input type="submit" class="boton" name="crear" value="Crear">
    </form>
<?php
}
