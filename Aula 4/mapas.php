<?php

    $frutas = array("morango", "maça", "abacaxi");

    echo"<p>".$frutas[0]."</p>";

    $frutas[0] = "laranja";

    $frutas["fruta"] = 15;

    $cores[0] = "azul";
    $cores["cor"] = "laranja";

    $mapa = [
        "valor1" => 1,
        "valor2" => 2,
        "valor3" => 3
    ];


    var_dump($cores);
    print_r($mapa);

?>