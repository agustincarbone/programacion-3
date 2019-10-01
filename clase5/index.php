<?php

use \Psr\Http\Message\RequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$config['displayErrorDetails']=true;
$config['addContentLengthHeader']=false;

$app = new \Slim\App(['settings' => $config]);

// Retornar objetos
$app->get('/datos[/]', function (Request $request, Response $response)
{
    $datos = array('nombre' => 'rogelio', 'apellido' => 'agua', 'edad' => 40);
    $newResponse = $response->withJson($datos, 200);
    return $newResponse;
});

//recibir objetos
// $app->post('/datos[/]', function (Request $request, Response $response)
// {
//     $arrayDeParametros = $request->getParsedBody();
//     $objeto = new stdClass();
//     $objeto->nombre=$arrayDeParametros['nombre'];
//     $objeto->apellido=$arrayDeParametros['apellido'];
//     $objeto->edad=$arrayDeParametros['edad'];
//     $newResponse = $response->withJson($objeto, 200);
//     return $newResponse;
// }); 

//recibir objetos y archivos
$app->post('[/]', function (Request $request, Response $response)
{
    $arrayDeParametros = $request->getParsedBody();
    $titulo = $arrayDeParametros['titulo'];
    $cantante = $arrayDeParametros['cantante'];
    $año = $arrayDeParametros['año'];
    
    $micd = new stdclass();
    $objeto->titulo=$titulo;
    $objeto->cantante=$cantante;
    $objeto->año=$año;
    $micd->InsertarElCdParametros();

    $archivos = $request->getUploadedFiles();
    $destino="./fotos/";
    $nombreAnterior = $archivos['foto']->getClientFilename();
    $extension = array_reverse($extension);
    $archivo['foto']->moveTo($destino.$titulo.".".$extension[0]);
    
    $response->getBody()->write("cd");

    return $response;
}); 


$app->run();

// $app->get('[/]', function (Request $request, Response $response)
// {
//     $response->getBody()->write("GET => Bienvenido!!!, a SlimFramework");
//     return $response;
// }); // trae recursos

// $app->post('[/]', function (Request $request, Response $response)
// {
//     $response->getBody()->write("POST => Bienvenido!!!, a SlimFramework");
//     return $response;
// }); //cargar recursos

// $app->put('[/]', function (Request $request, Response $response)
// {
//     $response->getBody()->write("PUT => Bienvenido!!!, a SlimFramework");
//     return $response;
// }); // modificar recursos

// $app->delete('[/]', function (Request $request, Response $response)
// {
//     $response->getBody()->write("DELETE => Bienvenido!!!, a SlimFramework");
//     return $response;
// }); // borrar recursos

// $app->run();

?>