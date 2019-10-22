<?php
  class Vehiculo {
    public $patente;
    public $marca;
    public $kilometros;


    public function __construct($patente, $marca, $kilometros) {
      $this->patente = $patente;
      $this->marca = $marca;
      $this->kilometros = $kilometros;
    }

    public static function traerVehiculos()
    {
      $ruta = "./Vehiculos.txt";
            
      $listaVehiculos = Archivo::leerArchivo($ruta);
      if($listaVehiculos == null)
      {
        $listaVehiculos = array();
      }
      return $listaVehiculos;
    }
  }

?>