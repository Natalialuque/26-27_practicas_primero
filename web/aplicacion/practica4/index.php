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
<?php

}
