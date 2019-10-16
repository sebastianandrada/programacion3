<?php
    class Archivo
    {
        public static function leerArchivo($ruta)
        {
            $lista=array();
            if(file_exists($ruta))
            {
                $archivo=fopen($ruta,'r');
                while(!feof($archivo))
                {
                    $objeto= json_decode(fgets($archivo));
                    if($objeto!=null)
                        array_push($lista,$objeto);
                }
                fclose($archivo);
            }
            return $lista;
        }

        public static function guardarObjeto($ruta,$objeto)
        {
            $archivo = fopen($ruta, 'a');
            fwrite($archivo, json_encode($objeto). PHP_EOL);
            fclose($archivo);
        }
    }
?>