<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
    // use App\Models\PDO\cd;
    // use App\Models\PDO\cdControler;
    


// include_once __DIR__ . '/../../src/app/modelPDO/cdControler.php';
 include_once __DIR__ . '/../../src/app/modelORM/usuario.php';



return function (App $app) {
    $app->group('/usuarios', function () {

       $this->post('/createUser', function ($request, $response, $args) {
          $parameters = $request->getParsedBody();
          /*$user = new Usuario();

          $user->email=$ArrayDeParametros['email'];*/
          $user->clave= crypt($ArrayDeParametros['clave']);
          /*$user->tipo=$ArrayDeParametros['tipo'];
          $user->rol=$ArrayDeParametros['rol'];*/
          
          return $response->getBody()->write($user->clave);
        });

    });

};
