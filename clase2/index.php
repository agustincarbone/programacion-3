<?php

// session_start();

require_once './clases/alumno.php';
include_once './clases/funciones.php';

// var_dump($_GET);
// echo $_GET['nombre'];
// isset($_GET['nombre']);

//  $alumno = new Alumno($_GET['nombre'],$_GET['apellido']);
//  $datos = $alumno->mostrar();
//  echo $datos;

// $cantidad = $_POST['cantidad'];
// $i = 0;

// while($i < $cantidad)
// {
//     $alumno = new alumno($_POST['nombre'],$_POST['apellido']);
//     $i = $i+1;
//     $datos = $alumno->saludar();
//     echo $datos;
// }

// if(!isset($_SESSION['alumno']))
// {
//     $_SESSION['alumno'] = array();
// }

if($_SERVER['REQUEST_METHOD'] == "GET")
{
    $alumno = new Alumno($_GET['nombre'],$_GET['apellido']);
    guardar($alumno);
    echo "se guardó el alumno";
}
elseif($_SERVER['REQUEST_METHOD'] == "POST")
{

    var_dump($_SESSION['alumno']);
}



?>