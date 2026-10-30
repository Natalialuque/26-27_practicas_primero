<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
//barra de ubicacion logica que nos indica donde estamos
 $ubicacion = [
 "pagina principal"=> "../../index.php",
 "inicio"=> "./index.php",

 ];
//controlador 
//se crea una instancia de la clase prueba
$instancia=new ClasePrueba();
//accede a la propiedad pública de la instancia
$instancia->propPublica=50;
//se accede a la propiedad de clase (estática)
ClasePrueba::$propEstatica[1]=10;


/////
$datos=["codigo"=>12,"nombre"=>"prueba2"];
$datosJSon=json_encode($datos);
//no hay constructor público, por lo que tengo que
//llamar a las funciones de creación estaticas
$p1 = Prueba::desdeDatos(5, 'Objeto');
$p2 = Prueba::desdeJson($datosJSon);

//$inst = new Prueba(12,"cadena");

cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION",$ubicacion);
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************
////vista cabecera donde podemos ver otros enlaces 

function cabecera() {}
//vista
function cuerpo()
{
?>

<?php
}


/**
 * Clase prueba usada para mostrar el funcionamiento de los
 * distintos elementos
 */
class ClasePrueba
{
    //definición de constantes
    public const PI = 2.14;
    //definición de propiedad
    public int $propPublica = 1;
    private string $_propPrivada = "hola";
    protected float $_propProtegida = 1.234;
    //definición de propiedad estática
    public static $propEstatica = array(1, 2, 3);
    //definición de método
    public function metodo()
    {
        //acceso a las propiedades desde el propio objeto
        $this->propPublica = 13;
        $this->_propPrivada = 100;
        $this->_propProtegida = "adios";
        //acceso a la propiedad estática
        self::$propEstatica[0] = "otra";
        return true;
    }
}


//
class Prueba
{
    private ?int $_codigo;
    private ?string $_nombre;
    //el constructor es privado
    private function __construct(?int $codigo = null, ?string $nombre =
    null)
    {
        $this->_codigo = $codigo;
        $this->_nombre = $nombre;
    }
    //constructor estatico publico
    public static function desdeDatos(int $codigo, string $nombre): static
    {
        if($codigo<0){
            $codigo=0;
        }

        //creo el objeto usando static
        $obj = new static($codigo, $nombre);
        return $obj;
    }
    //constructor estatico publico
    public static function desdeJson(string $json): static
    {
        $datos = json_decode($json);
        return new static($datos->codigo, $datos->nombre);
    }
}