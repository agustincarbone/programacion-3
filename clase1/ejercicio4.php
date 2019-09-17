<?php

$resultado = 0;
$numeros = array();

for($i=1;$resultado <= 1000; $i++)
{
    $resultado += $i;
    array_push($numeros,$i);
}

foreach($numeros as $valor)
{
    echo $valor." ";
}

echo "<br/>", "array_values($numeros)";
?>