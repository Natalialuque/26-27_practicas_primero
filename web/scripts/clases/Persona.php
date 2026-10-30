<?php 
//Definimos la clase persona
class Persona{
    /**
     * PROPIEDADES --> todas privadas
     *
     * @var string
     * @var string
     * @var string
     * @var string
     * @var EstadoCivil
     */
    private string $_nombre;
    private string $_fecha_nacimiento;
    private string $_domicilio;
    private string $_localidad;
    private EstadoCivil $_estadoCivil; //AQUI ES DONDE USAMOS EL ENUM

    /**
     * CONSTRUCTOR --> privado no se le pasa ningun valor como parametro y se rellenan las propiedades con valores
     */

    private function __construct(){
        $this->_nombre = "Prueba";
        $this->_fecha_nacimiento = "01/01/2000";
        $this->_domicilio = "Carrera 12";
        $this->_localidad = "Antequera";
        $this->_estadoCivil = EstadoCivil::soltero;
    }


    /**
     * CONSTRUCTOR ESTATICO --> a este si se le pasan los valores como parametros 
     *
     * @param string $nombre
     * @param string $fecNac
     * @param string $domicilio
     * @param string $localidad
     * @param EstadoCivil $estado
     * @return static
     */
    static public function registrarPersona(string $nombre,string $fecNac,string $domicilio,string $localidad, EstadoCivil $estado) :static{
        // esta funcion cuando se llama, accede a su propio constructor para crear el objeto ya que el constructor es privado
       $newPersona = new Persona();
       $newPersona->_nombre = $nombre;
       $newPersona->_fecha_nacimiento = $fecNac;
       $newPersona->_domicilio=$domicilio;
       $newPersona->_localidad=$localidad;
       $newPersona->_estadoCivil=$estado;

       //Podemos hacerlo tambien llamando a los set que hemos creado $newPersona->setEstado($estado);
       return $newPersona;
    }

    /**
     * GETTER´S AND SETTER´S -->
     * @return  string
     * @return void
     * @return  string
     * @return void
     * @return  string
     * @return void
     * @return  string
     * @return void
     */
    public function getNombre(): string{
        return $this->_nombre;
    }

    public function setNombre(string $valor): void {
        $this->_nombre = $valor;
    }

    public function getFechaNacimiento(): string{
        return $this->_fecha_nacimiento;
    }

    public function setFechaNacimiento(string $valor): void{
        $this->_fecha_nacimiento = $valor;
    }

    public function getDomicilio(): string{
        return $this->_domicilio;
    }

    public function setDomicilio(string $valor): void {
        $this->_domicilio = $valor;
    }

    public function getLocalidad(): string{
        return $this->_localidad;
    }

    public function setLocalidad(string $valor): void{
        $this->_localidad = $valor;
    }

    public function getEstado(): EstadoCivil{
        return $this->_estadoCivil;
    }

    public function setEstado(EstadoCivil $valor): void{
        $this->_estadoCivil = $valor;
    }


    /**
     * TO STRING --> metodo magico con el que vamos a devolver una cadena 
     * 
     * @return string
     */
    public function __toString(){
        return $this->_nombre . " es una persona ".  $this->_estadoCivil->descripcion() . 
        " nacida en " . $this->_fecha_nacimiento . " y que vive en " . $this->_localidad."(".$this->_domicilio.")";
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