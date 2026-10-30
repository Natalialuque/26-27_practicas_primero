<?php 
//vamos a crear la claseMispropiedades 
class ClaseMisPropiedades{
    /**
     * PROPIEDADES --> Tenemos una propiedad dinamica que es un array, una public que va a estar a nula y una privada inicializada a 25
     * @var array
     * @var mixed 
     * @var mixed 
     * @var array
     * @var integer  
     */
    private array $_propiedades = [];
    public mixed $propPublica = null;
    private mixed $_propPrivada = 25;
    

    /**
     * CONSTRUCTOR -->
     */

    /**
     * PROPIEDADES DINAMICAS --> en este ejercicio si nos pide que debemos permitirlas, pero claramente controladas
     * @return void
     * @return mixed
     * @return bool
     * @return void
     */
    
    // Asigna propiedades dinámicas
    public function _set(string $nombre, mixed $valor): void{
        if ($nombre === "_propPrivada") {
            throw new Exception("No se puede crear una propiedad dinámica llamada _propPrivada");
        }
        $this->_propiedades[$nombre] = $valor;
    }

    //Obtiene propiedades dinámicas
    public function __get(string $nombre): mixed{
        if (isset($this->_propiedades[$nombre])) {
            return $this->_propiedades[$nombre];
        }

        throw new Exception("La propiedad {$nombre} no existe");
    }
    
    public function __isset(string $nombre): bool{
        return isset($this->_propiedades[$nombre]);
    }

    public function __unset(string $nombre): void{
        unset($this->_propiedades[$nombre]);
    }

    

}