<?php


$obj = array("nombre"=>$_GET['nombre']);

$ar = fopen("objetos.json","a");
fwrite($ar,','.json_encode($obj));

fclose($ar);

?>