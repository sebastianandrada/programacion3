<?php
    class Persona {
        public $nombre;
        public $edad;

        function __construct($nombre, $edad){
            $this->nombre = $nombre;
            $this->edad = $edad;
        }

        function saludar() {
            echo("Hola mi nombre es: $this->nombre");
        }
    }
?>