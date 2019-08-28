<?php 
session_start(); 
//$arrSession;
if(!isset($_SESSION['alumnos'])){
  $arrAl = array();
  $_SESSION['alumnos'] = $arrAl;
}
function traerListado(){
  $arrSession = $_SESSION['alumnos'];
 // $arr = json_decode($arrSession);
  echo json_encode($arrSession);
}

function guardar($al){
  array_push($_SESSION['alumnos'], $al);
  echo json_encode($_SESSION['alumnos']);
}

?>