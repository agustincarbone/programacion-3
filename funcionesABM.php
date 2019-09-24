<?php

function alta()
{
    $parametros;

    if(isset ($_POST['nombre']))
    {
        $nombre = $_POST['nombre'];
        array_push($parametros,$nombre);
    }else
    {
        echo "no esta seteado el nombre";
    }
    
    if(isset ($_POST['apellido']))
    {
        $apellido = $_POST['apellido'];
        array_push($parametros,$apellido);
    }else
    {
        echo "no esta seteado el apellido";
    }
    
    if(isset ($_POST['legajo']))
    {    
        $legajo = $_POST['legajo'];
        array_push($parametros,$legajo);
    }else
    {
        echo "no esta seteado el legajo";
    }
}

function baja()
{
    
}

function modificacion()
{
    
}

?>