<?php

require_once './clases/alumno.php';

session_start();

if(!isset($_SESSION['alumno']))
{
    $_SESSION['alumno'] = array();
}

class Funciones extends Alumno
{
    
    public function traerListado()
    {
        $alumno = new Alumno($_GET['nombre'],$_GET['apellido']);
        array_push($_SESSION['alumno'],$alumno);
    }
    
    public function guardar($alumno)
    {
        array_push($_SESSION['alumno'],$alumno);
    }
}

?>