<?php
  class alumnoApi implements IApiUsable {
    public function TraerUno($request, $response, $args) {
      $id = $args['id'];
      $alumno = new stdClass();
      $newResponse = $response->withJson($alumno, 200);

      return $newResponse;
    }

    public function TraerTodos($request, $response, $args) {
      $alumnos; //recuperar desde fuente de datos
      $alumnos = new stdClass();

      $newResponse = $response->withJson($alumnos, 200);
      return $newResponse;
    }

    public function CargarUno($request, $response, $args) {
      $arrayDeParametros = $req->getParsedBody();
      $id = $arrayDeParametros['id'];
      $nombre = $arrayDeParametros['nombre'];
      $apellido = $arrayDeParametros['apellido'];
      $edad = $arrayDeParametros['edad'];
      $alumno;
      //$alumno = new Alumno($id, $nombre, $apellido, $edad); //crear luego
      //guardar en fuente de datos

      $newResponse = $res->withJson($alumno, 200);
      return $newResponse;
    }

    public function BorrarUno($request, $response, $args) {
      $id = $args['id'];

      //usar el id para borrar el alumno en la fuente de datos

      $newResponse = $res->getBody()->write("el alumno $id ha sido borrado");
      return $newResponse;
    }
  }
?>