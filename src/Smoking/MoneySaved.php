<?php

namespace Lametric\Smoking;

use Lametric\Smoking\Parameter\{ParameterAverage, ParameterCurrency, ParameterPrice};

class MoneySaved
{
    /** @var string */
    private $average;

    /** @var string */
    private $currency;

    /** @var string */
    private $price;

    /** @var int */
    private $days;

    /**
     * @param \Lametric\Smoking\Parameter\ParameterAverage $average
     */
    public function setAverage(ParameterAverage $average)
    {
        $this->average = $average->getData();
    }

    /**
     * @param \Lametric\Smoking\Parameter\ParameterCurrency $currency
     */
    public function setCurrency(ParameterCurrency $currency)
    {
        $this->currency = $currency->getData();
    }

    /**
     * @param \Lametric\Smoking\Parameter\ParameterPrice $price
     */
    public function setPrice(ParameterPrice $price)
    {
        $this->price = $price->getData();
    }

    /**
     * @param $days
     */
    public function setDays($days)
    {
        $this->days = $days;
    }

    /**
     * @return string
     */
    public function calculateTotalCigarettes(): string
    {
        return (int)($this->days * $this->average) . ' cigarettes';
    }

    /**
     * @return string
     */
    public function calculateMoneySaved(): string
    {
        return (int)($this->days * $this->average * $this->price) . $this->currency . ' saved';
    }

}