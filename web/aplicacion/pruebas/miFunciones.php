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