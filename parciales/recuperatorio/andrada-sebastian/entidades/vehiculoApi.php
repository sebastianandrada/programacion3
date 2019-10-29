<?php
  class VehiculoApi {
    public function __construct() {}

    public function cargarVehiculo($patente, $marca, $kms) {
      $vehiculo = new Vehiculo($patente, $marca, $kms);
      if(!VehiculoApi::estaPatenteRepetida($patente)) {
        Archivo::guardarObjeto('vehiculos.txt' , $vehiculo);
        echo 'vehiculo guardado';
      } else {
        echo "Patente repetida";
      }
      
    }

    public function cargarServicio($id, $tipo, $precio, $demora) {
      if(!VehiculoApi::estaTipoServicioRepetido($id)) {
        $tipoServicio = new TipoServicio($id, $tipo, $precio, $demora);
        Archivo::guardarObjeto('tipoServicio.txt', $tipoServicio);
        echo 'tipo servicio cargado';
      } else {
        echo 'tipo servicio repetido'; 
      }
      
    }

    public function consultarMarca($marca) {
      $lista = Vehiculo::traerVehiculos();
      $cantMarcas = 0;
      foreach($lista as $vehiculo) {
        if(strcasecmp($vehiculo->marca, $marca) == 0) {
          $cantMarcas += 1;
        }
      }
      if($cantMarcas == 0) {
        return "no existe " . $marca;
      }
      return $cantMarcas;
    }



    public function consultarPatente($patente) {
      $lista = Vehiculo::traerVehiculos();
      $cantPatente = 0;
      foreach($lista as $vehiculo) {
        if(strcasecmp($vehiculo->patente, $patente) == 0) {
          $cantPatente += 1;
        }
      }
      if($cantPatente == 0) {
        return "no existe " . $patente;
      }
      return $cantPatente;
    }

    public function consultarMarcaPatente($marca, $patente) {
      $lista = Vehiculo::traerVehiculos();
      $cantPatente = 0;
      foreach($lista as $vehiculo) {
        if(strcasecmp($vehiculo->patente, $patente) == 0 && strcasecmp($vehiculo->marca, $marca) == 0) {
          $cantPatente += 1;
          break;
        }
      }
      if($cantPatente == 0) {
        return "no existe " . $patente . "de marca " . $marca;
      }
      return $cantPatente;
    }


    public function estaPatenteRepetida($patente){
      $lista = Vehiculo::traerVehiculos();
      foreach($lista as $vehiculo) {
        if(strcasecmp($vehiculo->patente, $patente) == 0 ) {
          return true;
        }
      }
      return false;
    }

    private function estaTipoServicioRepetido($id) {
      $lista = TipoServicio::traerServicios();
      foreach($lista as $servicio) {
        if(strcasecmp($servicio->id, $id) == 0) {
          return true;
        }
      }
      return false;
    }
  }
?>