<?php
  $nombreArchivo = "objeto.json";
  $ar = fopen($nombreArchivo, "r");

  //echo fread($ar, filesize($nombreArchivo));
  $array = json_decode(fread($ar, filesize($nombreArchivo)));
  echo $array;
  fclose($ar);
?>