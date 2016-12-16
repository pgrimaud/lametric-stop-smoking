<?php
namespace Lametric\Smoking\Parameter;

class ParameterDay implements ParameterInterface
{
    /** @var string */
    private $data;

    /**
     * @param $data
     */
    public function setData($data)
    {
        $this->data = (int)$data;

        if ($this->data <= 0 || $data > 31) {
            throw new \InvalidArgumentException('Invalid parameter in ' . __CLASS__);
        }
    }

    /**
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }
}