<?php

final class Flauta extends InstrumentoViento implements IFabricable{

    //PROPIEDADES --> no hay nuevas 

    /**
    * CONSTRUCTOR 
    * -Se define privado 
    */
    private function __construct(string $material,int $edad)
    {
        parent::__construct($material,$edad);

    }

    /**
     * METODO ESTATICO CREARDESDEARRAY --> es como un "constructor" alternativo en el que mostramos las cosas 
     *                                      mediante un array
     */
    public static function crearDesdeArray(array $datos):static{
        
        //si material o edad no existe coger esos y usarlos por defecto
        $material = $datos["material"] ?? "madera";
        $edad = $datos["edad"] ?? 15;

        //devolvemos
        return new static($material,$edad);
    }

    /**
     * GETTER'S AND SETTER'S --> No tenemos, ya que no hay propiedades
     */

    /**
    * METODOS ABSTRACTOS -->  no se llaman 
    */

    /**
    * METODO MAGICO _TOSTRING --> llamamos al padre, no hay nada nuevo
    */
    public function __toString()
    {
        return parent::__toString();
    }

    /**
     * METODOS DE IFFABRICABLE --> 
     */
    public function metodoFabricacion(): string{
        return "La fabricación de una flauta consiste en cortar un tubo a medida, colocar un tapón junto a la embocadura con bisel para generar el sonido y perforar agujeros alineados a distancias específicas para controlar las notas.";
    }

    public function metodoReciclado(): string{
        return "Para hacer una flauta reciclada, se limpia un tubo de PVC, cartón duro o caña, se corta a unos 30 centímetros, se crea la embocadura con tapón y bisel para el silbato, y se perforan los agujeros de las notas alineados.";
    }



    /**
     * METODO DE CLONACION --> para poder clonar un objeto con los datos indicados
     */
    public function __clone(){
    //edad se va a 0 cuando se clona
    $this->_edad = 0;

    //el contador se suma uno
    self::$_cont++;

    //y se asigna a ordenacion
    $this->_ordencreacion = self::$_cont;
    }
}