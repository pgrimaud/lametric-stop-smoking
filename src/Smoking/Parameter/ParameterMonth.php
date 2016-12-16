<?php
namespace Lametric\Smoking\Parameter;

class ParameterMonth implements ParameterInterface
{
    /** @var string */
    private $data;

    /**
     * @param $data
     */
    public function setData($data)
    {
        $months = [
            '01' => 'january',
            '02' => 'february',
            '03' => 'march',
            '04' => 'april',
            '05' => 'may',
            '06' => 'june',
            '07' => 'july',
            '08' => 'august',
            '09' => 'september',
            '10' => 'october',
            '11' => 'november',
            '12' => 'december'
        ];

        if (!in_array($data, $months)) {
            throw new \InvalidArgumentException('Invalid parameter in ' . __CLASS__);
        }

        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }


}