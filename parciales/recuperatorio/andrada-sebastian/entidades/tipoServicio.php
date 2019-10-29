<?php 
  class TipoServicio {
    public $id;
    public $tipo;
    public $precio;
    public $demora;

    public function __construct($id, $tipo, $precio, $demora) {
      $this->id = $id;
      $this->tipo = $tipo;
      $this->precio = $precio;
      $this->demora = $demora;
    }

    public function traerServicios() {
      $ruta = "./tipoServicio.txt";
            
      $listaServicios = Archivo::leerArchivo($ruta);
      if($listaServicios == null)
      {
        $listaServicios = array();
      }
      return $listaServicios;
    }
    
  }
?>