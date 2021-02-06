<?php

namespace Lametric\Smoking;

use Lametric\Smoking\Parameter\{ParameterDay, ParameterMonth, ParameterYear};

class Date
{
    /** @var string */
    private $year;

    /** @var string */
    private $month;

    /** @var string */
    private $day;

    /**
     * @param \Lametric\Smoking\Parameter\ParameterYear $year
     */
    public function setYear(ParameterYear $year)
    {
        $this->year = $year->getData();
    }

    /**
     * @param \Lametric\Smoking\Parameter\ParameterMonth $month
     */
    public function setMonth(ParameterMonth $month)
    {
        $this->month = $month->getData();
    }

    /**
     * @param \Lametric\Smoking\Parameter\ParameterDay $day
     */
    public function setDay(ParameterDay $day)
    {
        $this->day = $day->getData();
    }

    /**
     * @return bool|\DateInterval
     */
    public function getDateDiff()
    {
        $dateNow  = new \DateTimeImmutable();
        $dateStop = new \DateTime($this->day . ' ' . $this->month . ' ' . $this->year);

        $diff = $dateStop->diff($dateNow);

        return $diff;
    }

    /**
     * @return string
     */
    public function calculateDateFormatted()
    {
        $stringToReturn = '';

        $diff = $this->getDateDiff();

        if ($diff->y) {
            $stringToReturn .= $diff->y . 'Y ';
        }

        if ($diff->m) {
            $stringToReturn .= $diff->m . 'M ';
        }

        if ($diff->d) {
            $stringToReturn .= $diff->d . 'D';
        }

        if ($stringToReturn === '') {
            $stringToReturn = '0 day';
        }

        return $stringToReturn;
    }

    /**
     * @return mixed
     */
    public function getDays()
    {
        $diff = $this->getDateDiff();
        return $diff->days;
    }
}
