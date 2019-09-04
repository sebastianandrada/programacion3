<?php
  $arr = array();
  $obj = array("nombre" => $_GET['nombre'], "apellido" => $_GET['apellido']);

  //$ar = fopen("objeto.json", "w");
  $arr = leer("objeto.json");
  array_push($arr, $obj);
  fwrite($ar, json_encode($arr));

  fclose($ar);

?>