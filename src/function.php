<?php

//Задание № 1

$arr = ['name', 'word', 'enter'];

function task1($arr, $bools)
{
    if ($bools !== true) {
        foreach ($arr as $strings) {
            echo '<p>' . ($strings) . '</p>';
        }
    } else {
        $some = implode(',', $arr);
        return var_dump($some);
    }
}

//Задание № 2

function task2(string $action, ...$args)
{
    switch ($action) {
        case '+':
            return array_sum($args);
        case '-':
            return array_shift($args) - array_sum($args);
        case '/':
            $result = array_shift($args);
            foreach ($args as $arg) {
                $result = $result / $arg;
            }
            return $result;
        case'*':
            $result = 1;
            foreach ($args as $arg) {
                $result *= $arg;
            }
            return $result;
    }
}

//Задание № 3

function task3($cols, $rows)
{
    echo "<table>";

    if (is_int($cols) && is_int($rows)) {

        for ($tr = 1; $tr <= $rows; $tr++) {
            echo '<tr>';

            for ($td = 1; $td <= $cols; $td++) {
                echo '<td>', $tr * $td, '</td>';
            }

            echo "</tr>";
        }
    } elseif (is_string($cols) || is_string($rows)) {
        echo "Вы ввели строковое значение вместо целого числа";
    } else {
        echo "Вы ввели не целое число";
    }

    echo "</table>";
}

// Задание № 4

function task4()
{
    echo date('Y-m-d H:i');
}

function task5()
{
    return mktime(0, 0, 0, 2, 24, 2016);
}

// Задание № 5
function task6()
{
    $str = 'Карл у Клары украл кораллы';
    echo str_replace('К', '', $str);
}

function task7()
{
    $str = 'Две бутылки лимонада';
    echo str_replace('Две', 'Три', $str);
}

// Задание № 6
function task8()
{
    file_put_contents('test.txt', 'Hello again !');
}

function task9(string $filename)
{
    $fp = fopen($filename, 'r');
    if (!$fp) {
        return false;
    }

    $str = '';
    while (!feof($fp)) {
        $str .= fgets($fp, 512);
    }
    echo $str;
}

