<?php
  class Log {
    public $ruta;
    public $metodo;
    public $hora;

    public function __construct($ruta, $metodo, $hora) {
      $this->ruta = $ruta;
      $this->metodo = $metodo;
      $this->hora = $hora;
    }

    public static function guardarLog($metodo, $ruta) {
      $hora = date('h:i:s');
      $log = new Log($metodo, $ruta, $hora);
      Archivo::guardarObjeto('./info.log', $log);
    }
  }
?>