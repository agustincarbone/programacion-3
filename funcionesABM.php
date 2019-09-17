<?php

function alta()
{
    $parametros;

    if(isset ($_POST['nombre']))
    {
        array_push($parametros,$_POST['nombre']);
         
        if(isset ($_POST['apellido']))
        {
            if(isset ($_POST['legajo']))
            {
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $legajo = $_POST['legajo'];



            }else
            {
                echo "no esta seteado el legajo";
            }
        }else
        {
            echo "no esta seteado el apellido";
        }

    }else
    {
        echo "no esta seteado el nombre";
    }


}

function baja()
{
    
}

function modificacion()
{
    
}

?>