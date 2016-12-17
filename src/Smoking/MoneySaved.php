<?php
namespace Lametric\Smoking;

use Lametric\Smoking\Parameter\ParameterAverage;
use Lametric\Smoking\Parameter\ParameterCurrency;
use Lametric\Smoking\Parameter\ParameterPrice;

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
     * @return int
     */
    public function calculateTotalCigarettes()
    {
        return (int)($this->days * $this->average) . ' cigarettes';
    }

    /**
     * @return int
     */
    public function calculateMoneySaved()
    {
        return (int)($this->days * $this->average * $this->price) . $this->currency . ' saved';
    }

}