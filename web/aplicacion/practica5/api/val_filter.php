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