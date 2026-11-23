<?php
require_once(dirname(__FILE__). "/../librerias/validacion.php");

class Punto{

    /**
    * CONSTANTES PUBLICAS --> Dos constantes de clase que albergan los colores y grosores
    */
    public const COLORES = [
        "black"=>["nombre"=>"negro", "rgb" =>[0,0,0]],
        "red" => ["nombre" => "rojo", "rgb" => [255, 0, 0]],
        "purple" => ["nombre" => "morado", "rgb" => [128, 0, 128]],
        "orange" => ["nombre" => "naranja", "rgb" => [255, 165, 0]]
    ];


    public const GROSORES = [
        1 =>"fino",   
        2 => "medio", 
        3 => "grueso"
    ];

    /**
    * PROPIEDADES -->privadas, de los puntos, color y grosor
    */
    private int $_x;
    private int $_y;
    private string $_color;
    private int $_grosor;

    /**
     * METODO MAGICO __CONSTRUCT --> se encarga de asignar los valor mediante setter, debemos usar excepciones 
     */
     public function __construct(int $x, int $y, string $color, int $grosor){
        if(!$this->setX($x)){
            throw new Exception("Valor de X invalido");
        }
        if(!$this->setY($y)){
            throw new Exception("Valor de Y invalido");
        } 
        if(!$this->setColor($color)) {
            throw new Exception("Valor de Color invalido");
        } 
        if(!$this->setGrosor($grosor)){
            throw new Exception("Valor de Grosor invalido");
        }
    }

    /**
     * 
     * 
     * GETTER'S AND SETTER'S 
     * 
     * 
     */

    /**
     * Metodo Get --> Devuelve el valor x
     * @return integer
     */
    public function getX():int {
        return $this->_x;
    }
     
    /**
     * metodo set --> verifica que el valor este bien y asigna
     *
     * @param integer $x
     * @return boolean
     */
    public function setX(int $x):bool{

        //verificamos rango
        if(!validaEntero($x,0,20000,0)){
            return false;
        }

        //asignamos valor
        $this->_x=$x;
        return true;
    }

    /**
     * Metodo Get --> Devuelve el valor y
     * @return integer
     */
    public function getY():int {
        return $this->_y;
    }

    /**
     * metodo set --> verifica que el valor este bien y asigna
     * @param integer $y
     * @return boolean
     */
    public function setY(int $y):bool{

        //verificamos rango
        if(!validaEntero($y,0,20000,0)){
            return false;
        }

        //asignamos valor
        $this->_y=$y;
        return true;
    }

    /**
     * Metodo get --> devuelve el color 
     *
     * @return string
     */
    public function getColor():string {
        return $this->_color;
    }

    /**
     * Metodo set --> debe de ser alguno de la cadena de COlores
     *
     * @return boolean
     */
   public function setColor(string $color): bool{
        //si existe lo asiGnamos
        if (array_key_exists($color, self::COLORES)) {
            $this->_color = $color;
            return true;
        }
        return false;
    }

    /**
     * Metodo set --> devuelve el grosor de 
     *
     * @return int
     */
    public function getGrosor():int {
        return $this->_grosor;
    }

    /**
     * Undocumented function
     *
     * @param integer $grosor
     * @return boolean
     */
    public function setGrosor(int $grosor): bool{
        
        if(array_key_exists($grosor, self::GROSORES)){
             $this->_grosor = $grosor;
            return true;
        }


        return false;
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