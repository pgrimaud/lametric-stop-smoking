<?php
namespace Lametric\Smoking\Parameter;

interface ParameterInterface
{
    /**
     * @param $data
     */
    public function setData($data);

    /**
     * @return mixed
     */
    public function getData();
}