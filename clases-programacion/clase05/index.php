<?php 
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(['settings' => $config]);

$app->get('[/]', function (Request $req,  Response $res, $args = []) {
  //return $res->withStatus(200)->write('Hola mundo');
  $res->getBody()->write("GET => Bienvenido!!! ,a SlimFramework");
  return $res;
});

$app->post('[/]', function (Request $request, Response $response) {
  $response->getBody()->write("POST => Bienvenido a Slim ");
  return $response;
});

$app->group('/alumnos', function () {
  $this->get('/', function ($req, $res) {
    //$al = array("nomb")
    $datos = array("id" => '100', "nombre" => 'nicolas', "apellido" => 'kirchner', "edad" => '33');
    $newResponse = $res->withJson($datos, 200);
    return $newResponse;
  });

  $this->get('/{id}', function ($req, $res, $args) {
    $id = $args['id'];
    $datos = array("id" => '1', "nombre" => 'nicolas', "apellido" => 'kirchner', "edad" => '33');
    $newResponse = $res->withJson($datos, 200);
    return $newResponse;
  });

  $this->post('/', function ($req, $res, $args) {
    $arrayDeParametros = $req->getParsedBody();

    $obj = new stdClass();
    $obj->id = $arrayDeParametros['id'];
    $obj->nombre = $arrayDeParametros['nombre'];
    $obj->apellido = $arrayDeParametros['apellido'];
    $obj->edad = $arrayDeParametros['edad'];

    //recibo el archivo
    $archivo = $req->getUploadedFiles();
    $destino = "./fotos/";
    //var_dump($archivo);
    $nombreAnterior = $archivo['image']->getClientFilename();
    $extension = explode('.', $nombreAnterior);
    $extension = array_reverse($extension);

    $archivo['image']->moveTo($destino.$obj->nombre.'.'.$extension[0]);

    $newResponse = $res->withJson($obj, 200);
    return $newResponse;
  });

  $this->put('/', function ($req, $res, $args) {
    $arrayDeParametros = $req->getParsedBody();

    $obj = new stdClass();
    $obj->id = $arrayDeParametros['id'];
    $obj->nombre = $arrayDeParametros['nombre'];
    $obj->apellido = $arrayDeParametros['apellido'];
    $obj->edad = $arrayDeParametros['edad'];
    $newResponse = $res->withJson($obj, 200);
    return $newResponse;
  }); 

  $this->delete('/', function ($req, $res, $args) {
    $arrayDeParametros = $req->getParsedBody();

    $obj = new stdClass();
    $obj->id = $arrayDeParametros['id'];
    $obj->nombre = $arrayDeParametros['nombre'];
    $obj->apellido = $arrayDeParametros['apellido'];
    $obj->edad = $arrayDeParametros['edad'];
    $newResponse = $res->withJson($obj, 200);
    return $newResponse;
  });
});


$app->run();
?>