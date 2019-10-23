<?php
  use \Psr\Http\Message\ServerRequestInterface as Request;
  use \Psr\Http\Message\ResponseInterface as Response;
  use \Firebase\JWT\JWT;

  require 'vendor/autoload.php';
  $config['displayErrorDetails'] = true;
  $config['addContentLengthHeader'] = false;
  $app = new \Slim\App(['settings' => $config]);

  $app->post('/login' , function (Request $req,  Response $res, $args = []) {
    $key = "mi_clave";
    $params = $req->getParsedBody();
    $usuario = $params['usuario'];
    $pass = $params['pass'];
    $token = array(
      "usuario" => $usuario,
      "pass" => $pass,
      "iat" => 1356999524,
      "nbf" => 1357000000,
      "exp" => 50000
    );
    $jwt = JWT::encode($token, $key);
    return $res->withJson($jwt, 200);
  });
  $app->group('/usuarios', function () {
    $this->get('[/]', function ($req, $res) {
      $token = $req->getHeader('mytoken')[0];
      echo $token;
      // $key = "mi_clave";
      // var_dump($token);
      // $decoded = JWT::decode($token, $key, array('HS256'));
      // var_dump($decoded);
    });
    
  });
  $app->add();

  $mwAuth = function($request, $response, $next) {
    $tkn = $req->getHeaders('token')[0];
    //if($this->esTokenValido()){}
  };

  $app->run();

?>