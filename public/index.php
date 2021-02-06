<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';
$config = require_once __DIR__ . '/../config/parameters.php';

Sentry\init(['dsn' => $config['sentry_key']]);

use Lametric\Smoking\{Date, MoneySaved, Response, Validation};

try {

    $objects = [];

    $validation = new Validation($_GET);
    $values     = $validation->getValuesCleaned();

    foreach ($values as $parameter => $value) {
        $className = "Lametric\\Smoking\\Parameter\\Parameter" . ucwords($parameter);

        $objects[$parameter] = new $className();
        $objects[$parameter]->setData($value);
    }

    $date = new Date();
    $date->setYear($objects['year']);
    $date->setMonth($objects['month']);
    $date->setDay($objects['day']);

    $dateFormatted = $date->calculateDateFormatted();

    $money = new MoneySaved();
    $money->setAverage($objects['average']);
    $money->setCurrency($objects['currency']);
    $money->setPrice($objects['price']);
    $money->setDays($date->getDays());

    $cigarettesFormatted = $money->calculateTotalCigarettes();
    $moneySaved          = $money->calculateMoneySaved();

    $response = new Response();

    echo $response->setData($dateFormatted, $cigarettesFormatted, $moneySaved);

} catch (Exception $e) {

    $response = new Response();

    echo $response->error();

}