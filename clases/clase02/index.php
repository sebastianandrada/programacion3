<?php
require_once './clases/persona.php';
include './clases/alumno.php';
include './clases/alumnoDAO.php';

  //var_dump ($_GET);
  //echo $_GET['nombre'];

  //$al = new Alumno($_GET['nombre'], $_GET['edad']);
  //$myJson =$al->mostrar();
  //echo $myJson;

  /*$alumnos = array();
  $x = 0;
  while( $x < $_POST['cantidad']){
    $al = new Alumno("juan", 23);
    array_push($alumnos, $al);
    $x++;
  }

 $myJson = json_encode($alumnos);
 echo $myJson;*/  

 /*
  $_REQUEST $_COOKIE $_SESSION
 */

 /**************************************Sesion*************** */
/* cas */


$tipoMetodo = $_SERVER["REQUEST_METHOD"];

 if($tipoMetodo == "POST"){
  $caso = $_POST['caso'];
  switch($caso){
    case 'alumno':
      $al = new Alumno($_POST['nombre'], $_POST['edad']);
      guardar($al);
      break;
    default :
      echo 'opcion incorrecta';
  }
  

} else if ($tipoMetodo == 'GET') {
  $caso = $_GET['caso'];
  switch($caso){
    case 'alumno':
      traerListado();
      break;
    default: 
      echo 'opcion incorrecta';
  }
  
  session_unset();
}

?>