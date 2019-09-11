<?php 
  class Alumno extends Persona {
    public function MostrarDatos() {
      return json_encode($this);
    }
  }
?>