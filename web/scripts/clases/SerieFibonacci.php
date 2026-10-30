<?php
//Definimos la clase de serie de fibonacci
class SerieFibonacci implements Iterator{
    
    /**
     * PROPIEDADES --> todas privadas
     * @var integer
     */
    private int $_limite;
    private int $_claveActual;

    /**
     * CONSTRUCTOR--> pasamos los propiedades por el contructor 
     * @param int $limite
     */
    public function __construct(int $limite){
        $this->_limite = $limite;
        $this->_claveActual = 0;
    }


    /**
     * IMPLEMENTACION DEL ITERATOR
     * @return mixed
     * @return mixed
     * @return void
     * @return void
     * @return bool
     */

    // Devuelve el elemento actual de la serie
    public function current(): mixed{
        return $this->calcularFibonacci($this->_claveActual);
    }
    //Devuelve la clave actual
    public function key(): mixed{
        return $this->_claveActual;
    }
    //Avanza una posición
    public function next(): void{
        $this->_claveActual++;
    }
    //Reinicia el recorrido
    public function rewind(): void{
        $this->_claveActual = 0;
    }
    //Comprueba si la posición es válida
    public function valid(): bool{
        return $this->_claveActual <= $this->_limite;
    }



    /**
     * METODOS --> Creamos dos metodos el de calcularFibonacci y el estatico de fFibonacci
     */

    /**
     * Calcula el valor de Fibonacci para una posición concreta.
     * @param int 
     * @return int 
     */
    private function calcularFibonacci(int $n): int{
        // Caso base F(0)
        if ($n === 0) {
            return 0;
        }

        // Caso base F(1)
        if ($n === 1) {
            return 1;
        }

        // Valores iniciales de la serie
        $a = 0;
        $b = 1;

        // Calculo iterativo hasta llegar a la posición solicitada
        for ($i = 2; $i <= $n; $i++) {
            //nuevo valor Fibonacci
            $c = $a + $b;

            //avanzamos una posición en la serie
            $a = $b;
            $b = $c;
        }

        // Devuelvo el valor calculado
        return $b;
    }

    /**
     * Generador estático de la serie Fibonacci.
     *
     * Genera valores utilizando yield para poder recorrer
     * la serie mediante foreach sin almacenar todos
     * los elementos en memoria.
     *
     * @param int 
     * @return Generator
     */
    public static function fFibonacci(int $ultimo): Generator{
        //valores iniciales de la serie
        $a = 0;
        $b = 1;

        //generación de la serie
        for ($i = 0; $i <= $ultimo; $i++) {
            //devuelve el valor actual al foreach
            yield $a;

            //dalcula el siguiente término
            $temp = $a + $b;

            //desplaza los valores
            $a = $b;
            $b = $temp;
        }
    }

     /**
     * SOBRECARGA DINAMICA --> la desabilitamos como pide al principio del pdf
     * 
     * @return void
     * @return mixed
     * @return bool
     * @return void
     */
    public function __set(string $name, mixed $value): void{
        throw new Exception("No existe la propiedad $name");
    }

    public function __get(string $name): mixed{
        throw new Exception("No existe la propiedad $name");
    }

    public function __isset(string $name): bool{
        return false;
    }

    public function __unset(string $name): void{
        throw new Exception("No existe la propiedad $name");
    }
}