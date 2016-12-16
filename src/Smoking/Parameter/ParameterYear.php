<?php
namespace Lametric\Smoking\Parameter;

class ParameterYear implements ParameterInterface
{
    /** @var string */
    private $data;

    /**
     * @param $data
     */
    public function setData($data)
    {
        $this->data = (int)$data;

        if ($this->data < 1900 || $this->data > 2030) {
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