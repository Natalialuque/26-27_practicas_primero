<?php 
//vamos a crear la claseMispropiedades 
class ClaseMisPropiedades implements Iterator{
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
    //Estas dos variables nuevas son para el recorrido del iterator
    private array $_iterable = [];
    private int $_pos = 0;
    
   
    /**
    * CONSTRUCTOR --> para tener inicializados las propiedades
    */
    public function __construct(){    
        $this->_propiedades = [];
        $this->_iterable = [];
        $this->_pos = 0;

        $this->propPublica = null;
        $this->_propPrivada = 25;
    }


    /**
     * PROPIEDADES DINAMICAS --> en este ejercicio si nos pide que debemos permitirlas, pero claramente controladas
     * @return void
     * @return mixed
     * @return bool
     * @return void
     */
    
    // Asigna propiedades dinámicas
    public function __set(string $nombre, mixed $valor): void{
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


    /**
     * METODOS DE LA IMPLEMENTACION DE ITERATOR 
     * rewind(): inicia el bucle
     * valid(): comprueba si el elemento existe, si no se termina
     * key(): saca el valor en el key del foreach
     * current(): saca el valor en el value del foreach
     * next(): avanza en el bucle.
     *  @return void
     * @return mixed
     * @return mixed
     * @return void
     * @return bool
     */
    //Construye el array que recorrerá el forach y reinicia la posición al inicio.
    public function rewind(): void{
        $this->_iterable = [];


        // Propiedades dinámicas
        foreach ($this->_propiedades as $clave => $valor) {
            $this->_iterable["oi_" . $clave] = $valor;
        }


        // Propiedades propias al final
        $this->_iterable["oi_propPublica"] = $this->propPublica;
        $this->_iterable["oi__propPrivada"] = $this->_propPrivada;


        $this->_pos = 0;
    }


    //Devuelve el valor actual del foreach el cual será el contenido asociado a la clave actual.
    public function current(): mixed{
        return array_values($this->_iterable)[$this->_pos];
    }


    //Devuelve la clave actual del foreach
    public function key(): mixed{
        return array_keys($this->_iterable)[$this->_pos];
    }


    //Avanza una posición dentro de la colección y ademas se ejecuta automáticamente al final de cada iteración.
    public function next(): void{
        $this->_pos++;
    }


    ///Comprueba si la posición actual es válida y uando devuelve false el foreach termina.
    public function valid(): bool{
        return $this->_pos < count($this->_iterable);
    }

}