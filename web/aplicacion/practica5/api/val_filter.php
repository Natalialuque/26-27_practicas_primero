<?php 
//espacio de nombres para poder llamarlas para probarla y diferenciar la libreria 
namespace VALFILTER;

/**
 * function validaEntero(int &$var, int $min, int $max, int $defecto):bool Esta función
 * comprueba que $var contiene un entero cuyo valor está entre $min y $max. En $var se
 * devuelve el entero saneado (en caso de no cumplir las condiciones asigna a $var el valor
 * $defecto). La función devuelve true si es correcto y false en caso contrario.
 * 
 * EN LA LIBRERIA FILTER SI TENEMOS VALIDACION CONCRETA
 *
 * @param integer $var
 * @param integer $min
 * @param integer $max
 * @param integer $defecto
 * @return boolean
 */
function validaEntero(int &$var, int $min, int $max, int $defecto): bool{
    //vemos que sea entero y que este entre minimo y maximo, mediante esto que se encuentra en la libreria Filter
    $resultado = filter_var(
        $var,
        FILTER_VALIDATE_INT,
        [
            "options" => [
                "min_range" => $min,
                "max_range" => $max
            ]
        ]
    );

    //si cumple devolvemos true
    if ($resultado !== false) {
        $var = $resultado;
        return true;
    }

    //si no cumple aplicamos el por defecto y devolvemos false
    $var = $defecto;
    return false;
}


/**
  * function validaReal(float &$var, float $min, float $max, float $defecto):bool Esta función
  *comprueba que $var contiene un real cuyo valor está entre $min y $max. En $var se devuelve
  *el real saneado (en caso de no cumplir las condiciones asigna a $var el valor $defecto). La
  *función devuelve true si es correcto y false en caso contrario.
  *
  *EN LA LIBRERIA FILTER SI TENEMOS VALIDACION CONCRETA
  * @param float $var
  * @param float $min
  * @param float $max
  * @param float $defecto
  * @return boolean
  */

function validaReal(float &$var, float $min, float $max, float $defecto): bool
{
    // Comprobamos que el valor sea un número real válido
    $resultado = filter_var($var, FILTER_VALIDATE_FLOAT);

    //si cumple devolvemos true
    if ($resultado !== false && $resultado >= $min && $resultado <= $max) {
        $var = $resultado;
        return true;
    }

    //si no cumple aplicamos el por defecto y devolvemos false
    $var = $defecto;
    return false;
}

/**
 * function validaFecha(string &$var, string $defecto):bool Esta función comprueba que $var
 *contiene una fecha correcta en el formato dd/mm/aaaa. En $var se devuelve la fecha saneada
 *(2 cifras para dia y mes y cuatro para año- ej fecha 1/2/2023 es válida aunque se sanea y se
 *convierte en 01/02/2023). En caso de no cumplir las condiciones devuelve $defecto en
 *$var. La función devuelve true si es correcta y false en caso contrario.
 *
 * NO EXISTE EN LA LIBRERIA FILTER NADA PARA VERIFICAR FECHA
 * 
 * @param string $var
 * @param string $defecto
 * @return boolean
 */
 function validaFecha(string &$var, string $defecto):bool{
    // Divide la fecha usando "/" como separador
    $fecha = mb_split("/", trim($var));

    // Debe tener exactamente 3 partes -> día, mes y año
    if (count($fecha) == 3) {

        // El año debe tener exactamente 4 cifras
        if (mb_strlen($fecha[2]) != 4) {
            $var = $defecto;
            return false;
        }

        // Si el día tiene una cifra añadimos un 0 delante
        if (mb_strlen($fecha[0]) == 1) {
            $fecha[0] = "0" . $fecha[0];
        }

        // Si el mes tiene una cifra añadimos un 0 delante
        if (mb_strlen($fecha[1]) == 1) {
            $fecha[1] = "0" . $fecha[1];
        }

        // Comprueba que la fecha exista realmente checkdate(mes, dia, año)
        if (checkdate((int)$fecha[1],(int)$fecha[0],(int)$fecha[2])) {
            $var = $fecha[0] . "/" . $fecha[1] . "/" .$fecha[2];
            return true;
        }
    }

    //si fecha no es valida cambiamos por la defecto 
    $var = $defecto;
    return false;
 }

/**
 * function validaHora(string &$var, string $defecto):bool Esta función comprueba que $var
 *contiene una hora correcta en el formato hh:mm:ss . En $var se devuelve la hora saneada (2
 *cifras para hora, min, segundos - Ej 0:5:1, hora valida aunque se sanea y se convierte a
 *00:05:01). En caso de no cumplir las condiciones devuelve $defecto en $var. La función
 *devuelve true si es correcta y false en caso contrario
 *
 *  NO EXISTE EN LA LIBRERIA FILTER NADA PARA VERIFICAR HORA
 * 
 * @param  $var
 * @param string $defecto
 * @return boolean
 */
function validaHora(string &$var, string $defecto): bool{
    // Divide la hora usando ":" como separador
    $hora = mb_split(":", trim($var));

    // Debe tener exactamente 3 partes ->hora, minuto y segundo
    if (count($hora) == 3) {

        // Si la hora tiene una sola cifra, añade un 0 delante
        if (mb_strlen($hora[0]) == 1) {
            $hora[0] = "0" . $hora[0];
        }

        // Si los minutos tienen una sola cifra, añade un 0 delante
        if (mb_strlen($hora[1]) == 1) {
            $hora[1] = "0" . $hora[1];
        }

        // Si los segundos tienen una sola cifra, añade un 0 delante
        if (mb_strlen($hora[2]) == 1) {
            $hora[2] = "0" . $hora[2];
        }

        // Convierte los valores a enteros para comprobar rangos
        $h = (int)$hora[0];
        $m = (int)$hora[1];
        $s = (int)$hora[2];

        // Comprueba que la hora sea válida
        if ($h >= 0 && $h <= 23 && $m >= 0 && $m <= 59 && $s >= 0 && $s <= 59) {

            $var = $hora[0] . ":" . $hora[1] . ":" . $hora[2];
            return true;
        }
    }

    // Si la hora no es valida cambiamos por defecto y devolvemos false
    $var = $defecto;
    return false;
}