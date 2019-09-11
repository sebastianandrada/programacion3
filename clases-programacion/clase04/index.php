<?php 
  require_once './clases/persona.php';
  require_once './clases/alumno.php';

  $alumno = new Alumno($_POST['nombre'], $_POST['apellido'], $_POST['legajo'], $_FILES['imagen']['tmp_name']);
  var_dump($alumno->MostrarDatos());
?>