<?php
// $ar = fopen("archivo.txt","w");
// fwrite($ar,"hola");
// // copy("archivo.txt","archivo2.txt");
// // unlink("archivo.txt");
// fclose($ar);

// $ar = fopen("archivo.txt","r");
// echo fread($ar,filesize("archivo.txt"));
// fclose($ar);

$ar = fopen("objetos.json","r");

while(!feof($ar))
{
    echo fgets($ar).'<br>';

}
fclose($ar);


?>