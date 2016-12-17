<?php
require __DIR__ . '/vendor/autoload.php';

use Lametric\Smoking;

try {

    $objects = [];

    $validation = new Smoking\Validation($_GET);
    $values     = $validation->getValuesCleaned();

    foreach ($values as $parameter => $value) {
        $className = "Lametric\\Smoking\\Parameter\\Parameter" . ucwords($parameter);

        $objects[$parameter] = new $className();
        $objects[$parameter]->setData($value);
    }

    $date = new Smoking\Date();
    $date->setYear($objects['year']);
    $date->setMonth($objects['month']);
    $date->setDay($objects['day']);

    $dateFormatted = $date->calculateDateFormatted();

    $money = new Smoking\MoneySaved();
    $money->setAverage($objects['average']);
    $money->setCurrency($objects['currency']);
    $money->setPrice($objects['price']);
    $money->setDays($date->getDays());

    $cigarettesFormatted = $money->calculateTotalCigarettes();
    $moneySaved          = $money->calculateMoneySaved();

    $response = new \Lametric\Smoking\Response();

    echo $response->setData($dateFormatted, $cigarettesFormatted, $moneySaved);

} catch (Exception $e) {

    $response = new \Lametric\Smoking\Response();

    echo $response->error();

}