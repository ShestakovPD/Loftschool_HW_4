<?php

$bmw = ["name" => "bmw", "model" => "X5", "speed" => 120, "doors" => 5, "year" => 2015];
$toyota = ["name" => "toyota", "model" => "Auris", "speed" => 130, "doors" => 5, "year" => 2013];
$opel = ["name" => "opel", "model" => "Astra", "speed" => 140, "doors" => 4, "year" => 2012];

$cars [] = $bmw;
$cars [] = $opel;
$cars [] = $toyota;

foreach ($cars as $names => $key) {
    echo "CAR " . $cars[$names]['name']; ?><br><?php
    echo $cars[$names]['model'] . " " . $cars[$names]['speed'] . " " . $cars[$names]['doors'] . " " . $cars[$names]['year']; ?>
    <br><?php
}

/*
 * Получить имя из названия переменной можно следующим образом
 * echo "CAR ".substr($bmw,1);
 * но в данном примере тогда придется делать три цикла foreach, сделал проще и понятнее.
 */
