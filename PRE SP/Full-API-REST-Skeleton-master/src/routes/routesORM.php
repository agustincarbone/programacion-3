<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\ORM\cd;
use App\Models\ORM\cdApi;


include_once __DIR__ . '/../../src/app/modelORM/usuario.php';
include_once __DIR__ . '/../../src/app/modelORM/usuarioControler.php';

return function (App $app) {
    $container = $app->getContainer();

     $app->group('/usuarioORM', function () {   
         
        $this->get('/', function ($request, $response, $args) {
          //return usuario::all()->toJson();
          $todosLosUsuarios=usuario::all();
          $newResponse = $response->withJson($todosLosUsuarios, 200);  
          return $newResponse;
        });
    });


     $app->group('/usuarioORM2', function () {   

        $this->get('/',usuarioApi::class . ':traerTodos');
   
    });

};