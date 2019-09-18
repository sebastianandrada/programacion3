<?php
  include './archivoDao.php';

  //$nombreArchivo = "texto.txt";
  //$ar = fopen($nombreArchivo, "r");
  //fwrite($ar, PHP_EOL."hola mundo");
  //copy($nombreArchivo, "copia.txt");
  //unlink("texto.txt");
  //  echo fread($ar, filesize($nombreArchivo));
  //fclose($ar);

  $tipoMetodo = $_SERVER["REQUEST_METHOD"];
  $archivoDao = new archivoDao('objeto.json');

  if ($tipoMetodo == "POST") {
    $caso = $_POST['caso'];
    switch($caso){
      case 'guardar': 
        $obj = array("id" => $_POST['id'], "nombre" => $_POST['nombre'], "apellido" => $_POST['apellido']);
        $archivoDao->guardar($obj);
      case 'modificar':
        $obj = array("id" => $_POST['id'], "nombre" => $_POST['nombre'], "apellido" => $_POST['apellido']);
        $archivoDao->modificar($obj);
      case 'borrar':
        $id = $_POST['id'];
        $archivoDao.borrar($id);
    }
  } else if($tipoMetodo == "GET") {
    $caso = $_GET['caso'];
    switch($caso){
      case 'listado':
        echo $archivoDao.obtenerListado();
    }
  }

?>