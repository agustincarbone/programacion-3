<?php

class Persona
{
    public $nombre;

    public function __construct($nombre)
    {
        $nombre=$nombre;
    }  
    
    public function saludar()
    {
        echo "hola ".$this->nombre;
    }
}

?>