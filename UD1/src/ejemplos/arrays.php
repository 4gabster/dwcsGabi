<?php

/**
 * Un array en PHP es un mapa ordenado con el formato
 * [clave => valor]
 */

//Declarar array con contenido
$var = array(
    "perro" => "Primer elemento",
    "pez" => 2.02,
    "gato" => true,
    "aceituna" => "Ultima inserción"
);

$var2 = []; //Array vacío

//Aceder a un elemento de un array
echo "<br>", $var["aceituna"];

//Agregar elementos en un array
//Por el final
array_push($var, "Super última inserción con array_push");
array_push($var, "otro push");
$var[] = "push con []";
//En una posición
$var["nuevo"] = true;
$var[90] = "Es un 90";
$var[] = "Sigue indexando";
var_dump($var);

//Eliminar un elemento de un array
unset($var["nuevo"]);

echo "Segundo vardump <br>";

var_dump($var);

//Recorrer
$var3 = ["Pera", "Manzana", "Plátano"];
for($i=0; $i<count($var3); $i++){
    echo "La posición $i del array tiene: ", $var3[$i],"<br>";
}
echo "Foreach: <br>";
//Con foreach (90% de los casos)
foreach($var as $key => $valor){
    echo  "$key => $valor<br>";
}
