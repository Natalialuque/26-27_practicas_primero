<?php 
/**
 * Creamos una clase enum de EstadoCivil con un Backed de int, ya que cada caso tiene asociado un numero
 */
enum EstadoCivil : int {

    /**
     * CASE --> son los posibles valores a tener
     */
    case soltero=10;
    case casado =20;
    case pareja=30;
    case viudo=40;

    /**
    * METODO DESCRIPCION -->devuelve el nombre del caso en concreto
    */
    function descripcion (): string{
        return $this -> name; //este name contiene el nombre del caso (soltero,casado,pareja..)
    }

    /**
     * METODO VALOR --> devuelve el valor de un caso en concreto
     */
    function valor (): int{
        return $this -> value; //este value contiene el valor de cada caso (soltero,casado,pareja..)
    }

    /**
     * METODO ESTATICO --> devuelve un array con todos los casos
     */
    static function arrayCasos():array{
        return self::cases(); //esto devuelve el objeto tal cual de arrays
    }
}