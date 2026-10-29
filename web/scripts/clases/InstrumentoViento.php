<?php
/**
 * Cremaos la clase de instrumentoViento, la cual herada de instrumentoBase
 */
class InstrumentoViento extends InstrumentoBase{

/**
* PROPIEDADES
*/ 
protected string $_material;


/**
* CONSTRUCTOR
* -Debe llevar inicializazo "intrumento de viento" que viene de la cadena padre 
* -Pasamos la edad de nuevo porque necesitamos ponerla por defecto a 15
* -Y pasamos material con "madera" ya que es el por defecto
*/
public function __construct(string $material="madera",int $edad=15)
{
    parent::__construct("instrumento de viento",$edad);
    $this ->_material = $material;

}

/**
 * GETTER'S AND SETTER´S
 */

//Nos dicen que no tenemos que crearlos para la propiedad $_material

/**
 * METODOS ABSTRACTOS 
 */

//a sonido no tenemos que hacerle nada
public function sonido(): string{
    return "Sonido:fiuu<br>";
}

//El método afinar no debe ser redefinible en las clases derivadas, por eso le ponemos final
final public function afinar(): string {
        return"Afinacion:ajustar boquilla<br>";
}


/**
* METODO MAGICO --> _toString con el que mostramos por pantalla
*/
public function __toString(): string{
    return 
        //llamaos al toString de la padre
        parent::__toString().
        //añadimos lo de material
        "Material del instrumento: {$this->_material}<br>";
   }



/**
 * SOBRE CARGA DINAMICA, no hay que desactivarla porque ya la hereda de la padre
 */

}