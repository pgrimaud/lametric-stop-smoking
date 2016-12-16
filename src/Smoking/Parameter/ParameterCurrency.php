<?php
namespace Lametric\Smoking\Parameter;

class ParameterCurrency implements ParameterInterface
{
    /** @var string */
    private $data;

    /**
     * @param $data
     */
    public function setData($data)
    {
        $currency = [
            'euro'   => '€',
            'dollar' => '$',
            'pound'  => '£',
            'yuan'   => '¥'
        ];

        if (!isset($currency[$data])) {
            throw new \InvalidArgumentException('Invalid parameter in ' . __CLASS__);
        }

        $this->data = $currency[$data];
    }

    /**
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }


}