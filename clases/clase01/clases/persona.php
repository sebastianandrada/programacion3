<?php
    class Persona {
        private $nombre;

        function __construct($nombre){
            $this->nombre = $nombre;
        }

        function saludar() {
            echo("Hola mi nombre es: $this->nombre");
        }
    }
?>