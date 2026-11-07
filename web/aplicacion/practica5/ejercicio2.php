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
    $valores["nombre"] = $nombre;

    /**
     * PASSWORD
     */
    $password = "";
    $defectoPassword = "PASSWORD_INVALIDA";
    $expre = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\$_\-;<>@]).{8,15}$/';

    if (isset($_POST["password"])) {

        // Recogemos la contraseña eliminando espacios del principio y al final
        $password = trim($_POST["password"]);

        // Comprobamos que no esté vacía
        if ($password === "") {

            $errores["password"][] = "La contraseña no puede estar vacía";

        // Comprobamos longitud máxima indicada en el ejercicio
        } elseif (!validaCadena($password, 15, $defectoPassword)) {

            $errores["password"][] = "La contraseña debe tener como máximo 15 caracteres";

            // Comprobamos que sea validad
        } elseif (!validaExpresion($password,$expre,$defectoPassword)) {
            $errores["password"][] ="La contraseña debe tener entre 8 y 15 caracteres, una mayúscula, una minúscula, una cifra y un carácter especial";
        }
    }

    //Guardamos el valor 
    $valores["password"] = $password;

    /**
     * FECHA NACIMIENTO 
     */
    $fechaNacimiento = "";
    $defectoFechaNacimiento = "FECHA_INVALIDA";

    // Comprobamos si se ha enviado el campo
    if (isset($_POST["fecha_nacimiento"])) {

        // Eliminamos espacios al principio y al final
        $fechaNacimiento = trim($_POST["fecha_nacimiento"]);

        // Comprobamos que no este vacía
        if ($fechaNacimiento === "") {

            $errores["fecha_nacimiento"][] ="La fecha de nacimiento no puede estar vacía";

            // Comprobamos que sea una fecha válida usando la función de la librería
        } elseif (!validaFecha($fechaNacimiento, $defectoFechaNacimiento)) {

            $errores["fecha_nacimiento"][] ="La fecha de nacimiento no es válida";
        }
    }

    //Guardamos el valor 
    $valores["fecha_nacimiento"] = $fechaNacimiento;

    /**
     * FECHA CARNET
     */
    $fechaCarnet = "";

    // Recogemos los tres elementos del formulario
    $diaCarnet = $_POST["fecha_carnet"]["dia"] ?? "";
    $mesCarnet = $_POST["fecha_carnet"]["mes"] ?? "";
    $anioCarnet = $_POST["fecha_carnet"]["anio"] ?? "";

    if ($diaCarnet !== "" && $mesCarnet !== "" && $anioCarnet !== "") {

        // Comprobamos que exista la fecha
        if (checkdate((int)$mesCarnet, (int)$diaCarnet, (int)$anioCarnet)) {

            $fechaCarnetObj =DateTime::createFromFormat("d/m/Y","$diaCarnet/$mesCarnet/$anioCarnet");

            // Solo si la fecha de nacimiento es correcta
            if (!isset($errores["fecha_nacimiento"])) {

                $fechaNacimientoObj = DateTime::createFromFormat("d/m/Y",$valores["fecha_nacimiento"]);

                // Fecha nacimiento + 18 años
                $mayoriaEdadObj = clone $fechaNacimientoObj;

                $mayoriaEdadObj->add(new DateInterval("P18Y") );

                // Comprobamos si tenía 18 años
                if ($fechaCarnetObj < $mayoriaEdadObj) {

                    $errores["fecha_carnet"][] ="La fecha del carnet debe ser posterior a la mayoría de edad";
                } else {

                    $fechaCarnet = $fechaCarnetObj->format("d/m/Y");
                }
            } else {

                $errores["fecha_carnet"][] ="La fecha de nacimiento no es válida";
            }
        } else {

            $errores["fecha_carnet"][] ="La fecha del carnet no es válida";
        }
    } else {

        $errores["fecha_carnet"][] ="Debes indicar día, mes y año";
    }

    // Guardamos los valores para volver a pintar el formulario

    $valores["fecha_carnet"]["dia"] = $diaCarnet;
    $valores["fecha_carnet"]["mes"] = $mesCarnet;
    $valores["fecha_carnet"]["anio"] = $anioCarnet;

    /**
     *HORA
     */
    $horaLevantarse = "";
    $defectoHora = "HORA_INVALIDA";

    // Comprobamos que se ha enviado el campo
    if (isset($_POST["hora_levantarse"])) {

        // Eliminamos espacios en blanco
        $horaLevantarse = trim($_POST["hora_levantarse"]);

        // Comprobamos que no esté vacío
        if ($horaLevantarse === "") {

            $errores["hora_levantarse"][] ="La hora de levantarse es obligatoria";

            // Comprobamos que la hora sea válida
        } elseif (!validaHora($horaLevantarse, $defectoHora)) {

            $errores["hora_levantarse"][] ="La hora introducida no es válida";
        }
    }

    // Guardamos el valor saneado
    $valores["hora_levantarse"] = $horaLevantarse;

    /**
     * ESTADO
     */
    $estado = "";

    // Estados permitidos segun el enunciado
    $estadosValidos = [1, 2, 3, 4];

    if (isset($_POST["estado"])) {

        $estado = (int)$_POST["estado"];

        // Comprobamos que el valor esté dentro
        // de los estados permitidos
        if (!validaRango($estado, $estadosValidos)) {

            $errores["estado"][] ="Debe seleccionar un estado válido";
        }
    } else {

        // No ha seleccionado ningún radio button
        $errores["estado"][] ="Debe seleccionar un estado";
    }

    // Guardamos el valor
    $valores["estado"] = $estado;

    /**
     * ESTUDIOS
     */
    $estudios = [];
    $estudiosValidos = [0, 1, 2, 3, 4, 5];

    // Recogemos los checkbox seleccionados
    if (isset($_POST["estudios"])) {

        $estudios = $_POST["estudios"];

        // Convertimos todos a entero
        $estudios = array_map("intval", $estudios);

        // Debe haber al menos uno seleccionado
        if (count($estudios) == 0) {

            $errores["estudios"][] ="Debe seleccionar al menos un estudio";
        } else {

            // Comprobar valores válidos
            foreach ($estudios as $estudio) {

                if (!in_array($estudio, $estudiosValidos)) {

                    $errores["estudios"][] = "Existe una opción de estudios no válida";

                    break;
                }
            }

            // Si marca "Sin estudios" (0) no puede haber ninguna otra opción
            if ( in_array(0, $estudios)&& count($estudios) > 1) {
                $errores["estudios"][] = "Si selecciona Sin estudios no puede marcar ninguna otra opción";
            }
        }
    } else {

        $errores["estudios"][] ="Debe seleccionar al menos un estudio";
    }

    // Guardamos el valor para repintar el formulario

    $valores["estudios"] = $estudios;

    /**
     * NUMERO HERMANOS 
     */

    $hermanos = 0;
    $defectoHermanos = 0;

    if (isset($_POST["hermanos"])) {

        $hermanos = $_POST["hermanos"];

        // Comprobamos que sea un entero entre 0 y 20
        if (!validaEntero($hermanos, 0, 20, $defectoHermanos)) {

            $errores["hermanos"][] ="El número de hermanos debe estar entre 0 y 20";
        }
    }

    // Guardamos el valor saneado
    $valores["hermanos"] = $hermanos;

    /**
     * SUELDO
     */
    $sueldo = 1100;
    $defectoSueldo = 1100;

    if (isset($_POST["sueldo"])) {

        $sueldo = $_POST["sueldo"];

        // Comprobamos que sea un real entre 1000 y 150000 euros
        if (!validaReal($sueldo, 1000, 150000, $defectoSueldo)) {

            $errores["sueldo"][] ="El sueldo debe estar entre 1000 y 150000 euros";
        }
    }

    // Guardamos el valor saneado
    $valores["sueldo"] = $sueldo;

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
function cuerpo($valores, $errores){
?>

<?php

    //if (empty($errores) && isset($_POST["crear"])) {
    //resumen($valores);
    //} else {
    formulario($valores, $errores);
    //}
}

/**
 *  FUNCION DONDE VAMOS A CREAR EL FORMULARIO
 *
 * @param [type] $valores
 * @param [type] $errores
 * @return void
 */
function formulario($valores, $errores)
{
    /**Esto es para los errores y no estar repitiendolo constantemente  */
    if (!empty($errores)) {
    echo "<div class='error'>";
    foreach ($errores as $campo => $listaErrores) {
        foreach ($listaErrores as $error) {
            echo "$campo => $error<br>";
        }
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
