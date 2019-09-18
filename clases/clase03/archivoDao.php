<?php
  class ArchivoDao {
    private $patharchivo;
    function __construct($patharchivo){
      $this->patharchivo = $patharchivo;
  }

    function leer($patharchivo){
      $arr = array();
      $ar = fopen($patharchivo, "r");
      while(!feof($ar)){
        $objAux = fgets($ar, ",");
        array_push($arr, $objAux);
      }
      return $arr;
    }

    function guardar($patharchivo, $obj){
      $arr = leer($patharchivo);
      array_push($arr, $obj);
      return $arr;
    }

    function borrar($patharchivo){
      $arr = leer($patharchivo);
      $id = $_POST['id'];
      for($i)
      array_
    }
  }
?>