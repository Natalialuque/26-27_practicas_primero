<?php

/**
 * CLASE PARA EXPLICAR FUNCIONES
 *
 */

//
/**
 * Funcion que devuelve un numero o un false
 *
 * @param integer $num
 * @return integer|false
 */
function doble(int $num):int|false{
    if($num<10){
        return false;
    };

    return 2 * $num;
}

/**
 * funcion con varios parametros
 */
function variosParametros (int $par1,string $par2="",float $par3=10.0):int|float{

    $par3+=$par1+$par2;
    return $par3;

}