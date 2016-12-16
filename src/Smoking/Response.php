<?php
namespace Lametric\Smoking;

class Response
{
    const ICON = 'i5162';

    /**
     * @return mixed
     */
    public function error()
    {
        return $this->asJson([
            'frames' => [
                [
                    'index' => 0,
                    'text'  => 'An error occured',
                    'icon'  => self::ICON
                ]
            ]
        ]);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function asJson($data = array())
    {
        header('Content-Type: application/json');

        return json_encode($data, JSON_PRETTY_PRINT);
    }

    /**
     * @param $time
     * @param $totalCigarettes
     * @param $moneySaved
     * @return mixed
     */
    public function setData($time, $totalCigarettes, $moneySaved)
    {
        return $this->asJson([
            'frames' => [
                [
                    'index' => 0,
                    'text'  => $time,
                    'icon'  => self::ICON
                ],
                [
                    'index' => 1,
                    'text'  => $totalCigarettes,
                    'icon'  => self::ICON
                ],
                [
                    'index' => 2,
                    'text'  => $moneySaved,
                    'icon'  => self::ICON
                ]
            ]
        ]);
    }
}