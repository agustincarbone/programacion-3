<?php

function moverArchivo($nombre,$destino)
{
    // $origen=$_FILES['text']['name'];
    // $destino="imagen.txt";
    move_uploaded_file($origen,$destino);
    
    // $path_parts = pathinfo($origen);
    // $extension = explode(".", $path_parts['basename']);
    $extension = explode(".", $nombre);
    $extension = end($extension);
    $nombreExtension = $nombre.'('.random_int(1,5).')'.'.'.$extension;
}
    
?>