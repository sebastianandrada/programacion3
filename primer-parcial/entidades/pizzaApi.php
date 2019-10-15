<?php
  require_once './entidades/pizza.php';
  require_once './entidades/archivos.php';

  class PizzaApi {
    public function __construct() {}

    public function cargarPizza($request, $response)
    {
      $ruta = './Pizza.txt';
      $args = $request->getParsedBody();
      if(isset($args['precio'], $args['tipo'], $args['cantidad'], $args['sabor'] )) {
        $tipo = $args['tipo']; $sabor = $args['sabor'];
        if($this->validarTipo($tipo) && $this->validarSabor($sabor) ) {
          if(!$this->existeCombinacion($tipo, $sabor)) {
            $lista = Archivo::leerArchivo($ruta);
            $id = count($lista) + 1;
            $archivos = $request->getUploadedFiles();
            $pizza = new Pizza($id,
              $args['precio'],
              $args['tipo'],
              $args['cantidad'],
              $args['sabor']
            );
            
            $this->guardarImagenes($archivos, $pizza);
            Archivo::guardarObjeto($ruta, $pizza);
            return $response->getBody()->write('Pizzas guardadas');
          } else {
            return $response->getBody()->write('Combinacion repetida');
          }
        } else {
          return $response->getBody()->write('Sabor y/o tipo incorrecto/s');
        }
      } 

      return $response->getBody()->write('error al guardar pizzas');
    }

    public function obtenerPizza($request, $response) {
      $args = $request->getQueryParams();
      if(isset($args['sabor'], $args['tipo'] )) {
        $tipo = $args['tipo']; $sabor = $args['sabor'];
        if($this->validarSabor($sabor) && $this->validarTipo($tipo) ) {
          if($this->existeCombinacion($tipo, $sabor)){
            $pizzas = Pizza::traerPizzas();
            $cantSabor = 0;
            foreach($pizzas as $pizza) {
                if(strcasecmp($pizza->tipo, $tipo) == 0 && strcasecmp($pizza->sabor, $sabor) == 0 ){
                  $cantSabor += $pizza->cantidad;
                }
            }
            return $response->getBody()->write("la cantidad de pizzas de tipo " . $tipo ." y sabor " . $sabor . " es: " . $cantSabor);
          } else {
            return $response->getBody()->write("No existe la combinacion " . $tipo . " " . $sabor);
          }
        }
        return $response->getBody()->write("nothing");
      }
    }

    private function guardarImagenes($archivos, $pizza) {
      $destino = './images/pizzas/';
      $nombreAnterior = $archivos['imagen1']->getClientFilename();
      $extension = explode('.', $nombreAnterior);
      $extension = array_reverse($extension);

      $archivos['imagen1']->moveTo($destino.$pizza->tipo.$pizza->sabor.'1.'.$extension[0]);
      $nombreAnterior = $archivos['imagen2']->getClientFilename();
      $archivos['imagen2']->moveTo($destino.$pizza->tipo.$pizza->sabor.'2.'.$extension[0]);
    }

    private function validarTipo($tipo) {
      return (strcasecmp($tipo, 'molde') == 0 || strcasecmp($tipo, 'piedra') == 0 );
    }

    private function validarSabor($sabor) {
      return (strcasecmp($sabor, 'muzza') == 0 || strcasecmp($sabor, 'jamon') == 0 || strcasecmp($sabor, 'especial') == 0 );
    }

    //true si la combinacion ya existe
    //false si la combinacion no existe
    private function existeCombinacion($tipo, $sabor) {
      $lista = Pizza::traerPizzas();
      if(count($lista) == 0){
        return false;
      }
      foreach($lista as $pizza) {
        // var_dump($pizza->sabor);
        // var_dump($pizza->tipo);
        if((strcasecmp($pizza->sabor, $sabor) == 0 && strcasecmp($pizza->tipo, $tipo) == 0)) {
          return true;
        }
      }
      return false;
    }
  }
?>