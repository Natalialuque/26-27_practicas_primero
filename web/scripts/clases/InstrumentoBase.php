<?php 
abstract class InstrumentoBase{

/**
 * PROPIEDADES
 */ 
private string $_cadena; //cadena 
protected int $_edad=10; //edad del instrumento
protected int $_ordencreacion; //orden de creación de la instancia 

//Veces que se ha creado la clase, esta propiedad es de clase
protected static int $_cont=0; 



/**
 * CONSTRUCTOR--> inicializamos cadena y la
 *
 * @param string $cade
 * @param integer $edad
 */
public function __construct(string $cade, int $edad=10)
{
   $this ->_cadena = $cade;
   $this -> _edad=$edad;
   self::$_cont++; //incrementa el número total de instrumentos creados
   $this->_ordencreacion=self::$_cont; //mostramos aqui a que nuevo objeto pertenece
}


/**
 * METODOS GETTER´S AND SETTER´S
 */
public function getCadena():string{
    return $this -> _cadena;
}

public function getEdad():int{
    return $this -> _edad;
}

public function getOrdenCreacion():int{
    return $this -> _ordencreacion;
}


//recordar que los set no devuelven nada, solo modifican el valor
public function setCadena(string $valor):void {
     $this->_cadena=$valor;
}

//de edad no tenemos set porque no vamos a modificarlo, cambia con enevejecer

//de ordenacion no tenemos set porque no vamos a modificarlo



/**
 *METODOS ABSTRACTOS
 *
 * @return string
 */

    //funcion de sonido el instrumento
    abstract public function sonido():string;
    //funcion de afinar el intrumento
    abstract public function afinar():string;

    //DEJAMOS ESTE METODO COMENTADO YA QUE HA SIDO PARA PROBAR
    //   public function sonido(string $valor) : string{
    //         return "Sonido de:".$valor ;

    //   }

    //DEJAMOS ESTE METODO COMENTADO YA QUE HA SIDO PARA PROBAR
    //  public function afinar(string $valor) : string{
    //      return "afinacion:".$valor;

    //  }


/**
 * FUNCION--> para envejecer de año en año
 *
 * @return void
 */
public function envejecer():void{

     $this->_edad++;

}

/**
 * METODOS MAGICO--> __tostring para mostrar todos los elementos de dicha clase por pantalla 
 *
 * @return string
 */
public function __toString(): string {
    return "Instrumento con descripción: {$this->_cadena}<br>
            Instancia {$this->_ordencreacion} de un total de " .self::$_cont . 
            "<br> Tiene {$this->_edad} años,
            <br> La clase es " . get_class($this).
            "<br>";
}


/**
 * DESABILITAR LA SOBRECARGA DINAMICA 
 *
 * @param [type] $name
 * @param [type] $value
 * @return void
 */
public function __set(string $name, mixed $value):void{
    throw new Exception("No existe la propiedad $name");
}

public function __get(string $name):mixed{
    throw new Exception("No existe la propiedad $name");
}

public function __isset(string $name):bool{
    return false;
}

public function __unset(string $name):void{
}

}