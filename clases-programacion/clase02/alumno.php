<?php
//  require_once '../clases/persona.php';
  class Alumno extends Persona {
    function mostrar(){
      return json_encode($this);
    }
  }
?>