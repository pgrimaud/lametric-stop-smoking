<?php

namespace Lametric\Smoking;

class Validation
{
    /** @var array */
    private $parameters = [
        'year',
        'month',
        'day',
        'average',
        'currency',
        'price',
    ];

    /** @var array */
    private $valuesCleaned = [];

    /**
     * Validation constructor.
     *
     * @param array $get
     * @throws \Exception
     */
    public function __construct($get = [])
    {
        foreach ($this->parameters as $parameter) {
            if (empty($get[$parameter])) {
                throw new \Exception('Missing parameter');
            }

            $this->valuesCleaned[$parameter] = addslashes(urldecode($get[$parameter]));
        }
    }

    /**
     * @return array
     */
    public function getValuesCleaned()
    {
        return $this->valuesCleaned;
    }

}