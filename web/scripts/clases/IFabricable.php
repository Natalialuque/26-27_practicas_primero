<?php
//creamos una interfaz que vamos a implementar en las clases que se pidan, donde vamos a tener si o si el uso de estos metodos
interface IFabricable {
    /**
     * devuelve los pasos para fabricar elemento
     * @return string
    */
    public function metodoFabricacion(): string;
    
    /**
     * devuelve el metodo de reciclado que se debe aplicar segun su fabricacion
     * @return string
     */
    public function metodoReciclado(): string;
}
 
?> 