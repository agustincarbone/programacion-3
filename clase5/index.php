<?php

use \Psr\Http\Message\RequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$config['displayErrorDetails']=true;
$config['addContentLengthHeader']=false;

$app = new \Slim\App(['settings' => $config]);

$app->get('/datos[/]', function (Request $request, Response $response)
{
    $response->getBody()->write("GET => Bienvenido!!!, a SlimFramework");
    return $response;
}); // trae recursos

$app->post('[/]', function (Request $request, Response $response)
{
    $response->getBody()->write("POST => Bienvenido!!!, a SlimFramework");
    return $response;
}); //cargar recursos

$app->put('[/]', function (Request $request, Response $response)
{
    $response->getBody()->write("PUT => Bienvenido!!!, a SlimFramework");
    return $response;
}); // modificar recursos

$app->delete('[/]', function (Request $request, Response $response)
{
    $response->getBody()->write("DELETE => Bienvenido!!!, a SlimFramework");
    return $response;
}); // borrar recursos

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