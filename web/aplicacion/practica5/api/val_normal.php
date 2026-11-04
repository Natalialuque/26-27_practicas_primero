<?php 
//espacio de nombres para poder llamarlas para probarla y diferenciar la libreria 
namespace VALNORMAL;

/**
 * function validaEntero(int &$var, int $min, int $max, int $defecto):bool Esta función
 * comprueba que $var contiene un entero cuyo valor está entre $min y $max. En $var se
 * devuelve el entero saneado (en caso de no cumplir las condiciones asigna a $var el valor
 * $defecto). La función devuelve true si es correcto y false en caso contrario.
 *
 * @param integer $var
 * @param integer $min
 * @param integer $max
 * @param integer $defecto
 * @return boolean
 */
function validaEntero(int &$var, int $min, int $max, int $defecto): bool{
 // Comprobamos si el valor está dentro del rango permitido
    if (is_int($var) && $var >= $min && $var <= $max) {
        return true;
    }

    // Si no cumple, asignamos el valor por defecto
    $var = $defecto;
    return false;
}

/**
 * function validaReal(float &$var, float $min, float $max, float $defecto):bool Esta función
 *comprueba que $var contiene un real cuyo valor está entre $min y $max. En $var se devuelve
 *el real saneado (en caso de no cumplir las condiciones asigna a $var el valor $defecto). La
 *función devuelve true si es correcto y false en caso contrario.
 */

 function validaReal(float &$var,float $min,float $max, float $defecto):bool{
    //comprobamos que este entre el rango, porque ya metemos en la funcion que tiene que ser FLOAT
    if($var >=$min && $var <= $max){
        return true;
    }

    $var=$defecto;
    return false;
 }