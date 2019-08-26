<?php
    $numerosSumados = 0;
    $resultado = 0;
    for($i=1; $i < 1000; $i++){
        $resultado = $i + $i +1;
        print("$i + $i+1");
        print($resultado); 
        print("<br/>");
        $numerosSumados++;
    }
    print("numeros sumados: $numerosSumados")
?>