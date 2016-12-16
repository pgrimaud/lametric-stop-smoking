<?php
require __DIR__ . '/vendor/autoload.php';

use Lametric\Smoking;

try {
    $validation = new Smoking\Validation($_GET);
    $values     = $validation->getValuesCleaned();
} catch (Exception $e) {

}