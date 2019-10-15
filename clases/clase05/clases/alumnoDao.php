<?php
  class AlumnoDao implements IdaoUsable {
    private $pathFile;
    function __construct($pathFile) {
      $this->pathFile;
    }

    public function get($id) {
      
    }

    public function getAll() {
      $arr = array();
      $file = fopen($this->pathfile);
      while(!feof($file)) {
        $objAux = fgets($file, 'r');
      }
    }

    public function save($alumno) {

    }

    public function update($alumno) {

    }

    public function delete($alumno) {

    }
    
  }
?>