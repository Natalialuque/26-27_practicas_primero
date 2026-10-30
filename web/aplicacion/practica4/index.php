<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
//barra de ubicacion logica que nos indica donde estamos
 $ubicacion = [
 "pagina principal"=> "../../index.php",
 "relacion 4"=> "./index.php",
 
 ];

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
 <h1 id="TituloCuerpo">Relación4:Clases</h1>

 <h4>Instrumento base</h4>
 <!-- en esta clase vamos a hacer unas pruebas al principio, que seguidamente quedaran comentadas 
  porque dicha clase pasa a ser abstracta -->
<?php
//creamos las dos instancias y probamos la clase
        // $instrumentoBase = new InstrumentoBase("Guitarra");
        // $instrumentoBase2 = new InstrumentoBase("Corneta", 12);

        // echo $instrumentoBase;
        // echo $instrumentoBase->afinar(" de pinza") . "<br>";
        // echo $instrumentoBase->sonido("cuerda") . "<br>"; 

        // echo "<br>";

        // echo $instrumentoBase2;
        // $instrumentoBase2->envejecer();
        // echo "Edad después de envejecer: " . $instrumentoBase2->getEdad() . "<br>";    

echo "<p>Esto es una clase padre, he realizado pruebas pero estan comentados</p>";

?>
 <h4>IFabricable</h4>
<?php
echo"<p>En esta clase tenemos dos metodos dentro de una interfaz, que vamos a implementar en otras clases</p>";
?>
<h4>InstrumentoViento</h4>
<?php
        //Creamos 2 --> 1 con valores por defecto // 2 con valores modifcacos
        $instrumentoViento = new InstrumentoViento();
        $instrumentoViento2 = new InstrumentoViento("metal",18);

        //mostramos al instrumento 1, con los valores por defecto
        echo "<h5>Instrumento 1 </h5>";
        echo $instrumentoViento;
        echo $instrumentoViento -> afinar();
        echo $instrumentoViento2 -> sonido();
        
        echo "<br>";
        
        //mostramos el instrumento 2, con los valores que le hemos pasado
        echo "<h5>Instrumento 2 </h5>";
        echo $instrumentoViento2;
        echo $instrumentoViento -> afinar();
        echo $instrumentoViento2 -> sonido();
?>
<h4>Flauta</h4>
<?php
        //creamos el array
        $array = [
                "edad" => 12,
                "material" => "madera"
        ];

        $obj = Flauta::crearDesdeArray($array);

        //con esto probamos la clonacion
        $obj2 = clone $obj;

        echo "<h5>Flauta 1</h5>";
        echo $obj;
        echo "<h5>Flauta 2</h5>";
        echo $obj2;

?>
<h4>EstadoCivil y Persona</h4>
<?php
        // Obtener todos los estados posibles
        $casos = EstadoCivil::arrayCasos();

        // Elegir uno aleatorio
        $estadoAleatorio = $casos[array_rand($casos)];

        // Crear persona
        $persona = Persona::registrarPersona(
                "Natalia",
                "04/04/2004",
                "Calle Real 20",
                "Málaga",
                $estadoAleatorio
        );

        // Mostrar la persona
        echo $persona;

?>
<h4>SerieFibonacci</h4>
<?php

        echo "<h5>Prueba Iterator</h5>";
        //creamos la serie de fibo de limite 10
        $fibonacci = new SerieFibonacci(10);

        //recorremos con foreach y lo vamos mostrando
        foreach ($fibonacci as $valor) {
                echo $valor . PHP_EOL;
        }
        
        //Probamos la funcion de Generador
        echo "<h5>Prueba Generador</h5>";

        foreach (SerieFibonacci::fFibonacci(8) as $valor) {
                echo $valor . PHP_EOL;
        }
?>
<h4>ClaseMisPropiedades</h4>
<?php
        // Creamos un objeto de la clase
        $objeto = new ClaseMisPropiedades();

        // Asignamos un valor a la propiedad pública de la clase
        $objeto->propPublica = "publica";

        /**  Creamos propiedades dinámicas.
        * Estas propiedades NO están declaradas en la clase,por lo que PHP llamará automáticamente al método __set().
        */
        $objeto->propiedad1 = 25;
        $objeto->propiedad2 = "cadena de texto";
        $objeto->propiedad3 = true;

        /**
         *Leemos las propiedades dinámicas.
         *Como no existen físicamente en la clase, PHP llamará automáticamente al método __get().
        */     
        echo "Propiedad 1: " . $objeto->propiedad1 . "<br>";
        echo "Propiedad 2: " . $objeto->propiedad2 . "<br><br>";

        echo "<h5>forEach</h5>";
        
        /**
        *Para recorrer el iterator 
        */
        foreach ($objeto as $clave => $valor) {
                echo $clave . " => " . $valor . "<br>";
        }

}
