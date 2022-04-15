<?php

interface iRate
{
    public function tripCostCalc();
}

trait Service
{
    public $gps = 15;
    public $driver = 100;

    public function tripCostCalcService(bool $gpsX, bool $dr)
    {

        if ($gpsX) {
            $gps = 15;
            $gpsM = "активирована";
        } else {
            $gps = 0;
            $gpsM = "не активирована";
        };
        if ($dr) {
            $driver = 100;
            $drM = "активирована";
        } else {
            $driver = 0;
            $drM = "не активирована";
        };

        return [$gps, $gpsM, $driver, $drM];
    }
}

abstract class Rate implements iRate
{
    use Service;

    public function __construct($a, $b, $c, $d)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
        $this->d = $d;
    }

}

class BaseRate extends Rate
{

    public $priceOneKm = 10;
    public $priceOneMin = 3;
    public $ratename = "Базовый";

    public function tripCostCalc()
    {

        $mass = Rate::tripCostCalcService($this->c, $this->d);
        $gps = $mass[0];
        $gpsM = $mass[1];
        $driver = $mass[2];
        $drM = $mass[3];

        $km = $this->a;
        $min = $this->b;
        $priceOneKm = $this->priceOneKm;
        $priceOneMin = $this->priceOneMin;
        $ratename = $this->ratename;

        echo "Тариф $ratename" . "(Проехали $km км, $min минут)"; ?><br><?
        echo "Допуслуги: GPS в салон $gpsM,"; ?><br><?
        echo "           Допводитель $drM"; ?><br><?
        ?><br><?

        $Cost = ($km * $priceOneKm) + ($min * $priceOneMin) + $gps + $driver;
        echo "$km km * $priceOneKm руб/км + $min мин * $priceOneMin руб.мин + $gps руб/час + $driver рублей единоразово =  ";
        return $Cost;
    }

}

class HourRate extends Rate
{

    public $priceOneKm = 0;
    public $minR = 60;
    public $ratename = "Почасовой";

    public function tripCostCalc()
    {

        $mass = Rate::tripCostCalcService($this->c, $this->d);
        $gps = $mass[0];
        $gpsM = $mass[1];
        $driver = $mass[2];
        $drM = $mass[3];

        $km = $this->a;
        $min = $this->b;
        $minR = $this->minR;
        $priceOneKm = $this->priceOneKm;
        $ratename = $this->ratename;

        if ($min > 1 && $min <= 60) {
            $minR = 60;
            $hour = 1;
        }
        if ($min > 60) {
            $hour = round(($min / 60), 0, PHP_ROUND_HALF_UP);
        }

        echo "Тариф $ratename" . "(Проехали $km км, $min минут)"; ?><br><?
        echo "Допуслуги: GPS в салон $gpsM,"; ?><br><?
        echo "           Допводитель $drM"; ?><br><?
        ?><br><?

        $Cost = ($km * $priceOneKm) + ($minR * $hour) + $gps + $driver;
        echo "$km km * $priceOneKm руб/км + $hour час(a) * $minR руб.час + $gps руб/час + $driver рублей единоразово =  ";
        return $Cost;
    }

}

class StudentsRate extends Rate
{

    public $priceOneKm = 4;
    public $priceOneMin = 1;
    public $ratename = "Студенческий";

    public function tripCostCalc()
    {

        $mass = Rate::tripCostCalcService($this->c, $this->d);
        $gps = $mass[0];
        $gpsM = $mass[1];
        $driver = $mass[2];
        $drM = $mass[3];

        $km = $this->a;
        $min = $this->b;
        $priceOneKm = $this->priceOneKm;
        $priceOneMin = $this->priceOneMin;
        $ratename = $this->ratename;

        echo "Тариф $ratename" . "(Проехали $km км, $min минут)"; ?><br><?
        echo "Допуслуги: GPS в салон $gpsM,"; ?><br><?
        echo "           Допводитель $drM"; ?><br><?
        ?><br><?

        $Cost = ($km * $priceOneKm) + ($min * $priceOneMin) + $gps + $driver;
        echo "$km km * $priceOneKm руб/км + $min мин * $priceOneMin руб.мин + $gps руб/час + $driver рублей единоразово =  ";
        return $Cost;
    }

}

/*
Для расчета тарифа введите название тарифа 
и в аргументах укажите 
1. Сколько проехали км.
2. Сколько минут заняла поездка.
3. Для активации допуслуги GPS введите 1, если не желаете активировать 0
4. Для активации допуслуги допводитель введите 1, если не желаете активировать 0
*/

$w = new StudentsRate(2, 3, 1, 1);
echo $w->tripCostCalc();

?><br><?
?><br><?

$q = new HourRate(3, 151, 1, 0);
echo $q->tripCostCalc();

?><br><?
?><br><?

$e = new BaseRate(4, 6, 0, 1);
echo $e->tripCostCalc();
