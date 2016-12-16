<?php
namespace Lametric\Smoking\Parameter;

class ParameterPrice implements ParameterInterface
{
    /** @var string */
    private $data;

    /**
     * @param $data
     */
    public function setData($data)
    {
        $data       = str_replace(',', '.', $data);
        $this->data = (float)$data;
    }

    /**
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }


}