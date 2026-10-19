<?php 
/**
 *FUNCION 1 --> CUENTA VECES 
 *  Tenemos que pasarle un 4 parametros 
 *  La funcion va aladiendo al array la posicion de la cadena 
 *  Debe de ir actualizandose
 *  Cuando se llama se devuelve en las segunda numero un valor correspondiente (4 para la cuarta)
 *  True si todo ok, o false si  da error. 
 *
 * @param array $array
 * @param string $cadena
 * @param integer $valor1
 * @param integer $valor2
 * @return boolean
 */

//&--> Son para que modofique la variable y no genere una copia, importante para hacer modificaciones 
function cuentaVeces(array &$array, string $cadena, int $valor1, int &$valor2): bool {
   
    //contador estaticopara que no se borre cada vez que se llama a la funcio
    static $cont=0;
    $cont++;
    $valor2=$cont;
   
    //si la cadena tiene 2daw o primera debed deovolver un falso 
    if ($cadena === "2daw" || $cadena === "primera") {
        return false;
    }

    // Añadir o acumador el valor al array en la clave indicada
    //isset se encarga de coprobar si en el array existe ya la clave correspondiente
    if (isset($array[$cadena])) {
        $array[$cadena] += $valor1;
    } else {
        $array[$cadena] = $valor1;
    }

    return true;
}

/**
 * FUNCION 2 --> GENERAR CADENA ALEATORIA 
 * necesitamos una cantidad de num con la que vamos a gnerar la cadena, y por defecto son 10
 * si es menor o igual a 0 devolvemos false 
 * si esta bien devolvemos la cadena 
 *
 * @param integer $num // por defecto es 10
 * @return boolean
 */
function generarCadena(int $num = 10): string|false {

    //si el numero es negativo o 0 se devuelve false
    if ($num<=0){
        return false;
    }

    //variable cadena 
     $cadena='';

     //expresion regular con minusculas mayusculas y numeros 
     $regex = '/[A-Za-z0-9]/';

    
     //Bucle en el que recorresmos la cantidad de caracteres que queremos y sacamos aleatorios de esa expresion regular 
     for ($i = 0; $i < $num; $i++) {
        do {
            $caracter = chr(rand(48, 122));
        } while (!preg_match($regex, $caracter));
             $cadena .= $caracter;
        }


    return $cadena;
}

/**
 * FUNCION 3 --> OPERACIONES 
 * vamos a hacer opraciones de suma,resta,multi y suma pares e impares 
 * usamos un swtich que vaya recorriendo
 * tenemos suerte de que tenemos unos metodos de array que nos hacen suma y multi 
 * La resta es un poco mas complicada, porque tenemos que sacar el primer numero y recorrer los siguientes para ir restando
 * 
 *
 * @param integer $operador
 * @param float ...$numeros
 * @return float|false
 */
//el float ...$numeros permite que la funcion reciba una cantidad idefinida de datos
function operaciones(int $operador, float ...$numeros): float|false{
     
    // Debe haber al menos dos operandos
    if (count($numeros) < 2) {
        return false;
    }

    //swtich 
    switch ($operador){
        case 1 : //suma 
            return array_sum($numeros); //suma los numeros del array 
        case 2:  //resta 
            $resultado = array_shift($numeros); // toma el primer número
            foreach ($numeros as $num) {//va sacando el los numeros del array
                $resultado -= $num;
            }
            return $resultado;
        case 3: //multiplicacion
            return array_product($numeros); //multiplica los numeros
        default: // suma de pares, resta de impares (posición 1 es impar)
            $resultado = 0;
            foreach ($numeros as $i => $num) {
                $posicion = $i + 1; // primer operando es posición 1
                if ($posicion % 2 === 0) {
                    $resultado += $num; //Posición par -> sumar
                } else {
                    $resultado -= $num; //Posición impar -> restar
                }
            }
            return $resultado;
    }
}

function devuelve(){
    
}