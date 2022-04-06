<?php

$age = (int)null;
$age = random_int(1, 80);

if ($age >= 18 && $age < 65) {
    echo 'Вам еще работать и работать';
} elseif ($age > 65) {
    echo 'Вам пора на пенсию';
} elseif ($age >= 1 && $age <= 17) {
    echo 'Вам еще рано работать';
} else {
    echo 'Неизвестный возраст';
}


