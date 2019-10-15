<?php
  interface IdaoUsable
  {
    public function get($id);
    public function getAll();
    public function save($alumno);
    public function update($alumno);
    public function delete($alumno);
  }
?>
