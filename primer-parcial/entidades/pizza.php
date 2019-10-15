<?php
  class Pizza
  {
    public $id;
    public $precio;
    public $tipo;
    public $cantidad;
    public $sabor;

    public function __construct($id, $precio, $tipo, $cantidad, $sabor) {
      $this->id = $id;
      $this->precio = $precio;
      $this->tipo = $tipo;
      $this->cantidad = $cantidad;
      $this->sabor = $sabor;
    }

    public static function traerPizzas()
    {
      $ruta = "./Pizza.txt";
            
      $listaPizzas = Archivo::leerArchivo($ruta);
      if($listaPizzas == null)
      {
        $listaPizzas = array();
      }
      return $listaPizzas;
    }
  }
?>