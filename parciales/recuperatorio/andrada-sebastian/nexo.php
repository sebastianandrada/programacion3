<?php
  include_once './entidades/archivo.php';
  include_once './entidades/vehiculo.php';
  include_once './entidades/tipoServicio.php';
  include_once './entidades/vehiculoApi.php';

  $tipoMetodo = $_SERVER["REQUEST_METHOD"];

  if ($tipoMetodo == "POST") {
    $caso = $_POST['caso'];
    switch($caso){
      case 'cargarVehiculo':
        $patente = $_POST['patente'];
        $marca = $_POST['marca'];
        $kms = $_POST['kilometros'];
        VehiculoApi::cargarVehiculo($patente, $marca, $kms);
        break;

      case 'cargarTipoServicio':
        $id = $_POST['id'];
        $tipo = $_POST['tipo'];
        $precio = $_POST['precio'];
        $demora = $_POST['demora'];
        VehiculoApi::cargarServicio($id, $tipo, $precio, $demora);
        break;
    }
  } else if($tipoMetodo == "GET") {
    $caso = $_GET['caso'];
    switch($caso){
      case 'consultarVehiculo':
      if(isset($_GET['marca']) && !isset($_GET['patente'])) {
        $marca = $_GET['marca'];
        echo VehiculoApi::consultarMarca($marca);
      }
      if(isset($_GET['marca']) && isset($_GET['patente'])) {
        $marca = $_GET['marca'];
        $patente = $_GET['patente'];
        echo VehiculoApi::consultarMarcaPatente($marca, $patente);
      }
      if(isset($_GET['patente']) && !isset($_GET['marca'])) {
        $patente = $_GET['patente'];
        echo VehiculoApi::consultarPatente($patente);
      }
    }
  }
?>
