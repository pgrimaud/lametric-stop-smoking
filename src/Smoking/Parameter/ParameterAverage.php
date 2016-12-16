<?php
namespace Lametric\Smoking\Parameter;

class ParameterAverage implements ParameterInterface
{
    /** @var string */
    private $data;

    /**
     * @param $data
     */
    public function setData($data)
    {
        $this->data = (int)$data;
    }

    /**
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }


}