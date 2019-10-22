<?php
  use Psr\Http\Message\ServerRequestInterface as Request;
  use Psr\Http\Message\ResponseInterface as Response;

  require_once 'vendor/autoload.php';
  require_once './entidades/pizzaApi.php';

  $config['displayErrorDetails'] = true;
  $config['addContentLengthHeader'] = false;

  $app = new \Slim\App(["settings" => $config]);

  $app->group('/pizzas', function() {
    //cargar pizzas
    $this->post('[/]', \PizzaApi::class . ':cargarPizza');

    $this->get('[/]', \PizzaApi::class . ':obtenerPizza');
  });

  $app->group('/ventas', function() {
    $this->post('[/]', VentasApi::class, ':cargarVenta');
  });

  $app->run()
?>