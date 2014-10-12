<?php

namespace Paveldacar\AccountsKeeperBundle\Utils;

class DateFormatter {

    private $months = [
        'janvier',
        'février',
        'mars',
        'avril',
        'mai',
        'juin',
        'juillet',
        'août',
        'septembre',
        'octobre',
        'novembre',
        'décembre'
    ];

    /**
     * Return the month passed as argument in string. If the argument is null, return the current month.
     *
     * @param string $monthNumber
     * @return string
     */
    public function getStringMonth($monthNumber) {
        if ($monthNumber == null) {
            $monthNumber = date('m');
        }

        $monthNumber--;

        return $this->months[$monthNumber];
    }

    /**
     * Return either the year passed as argument if not null or the current year.
     *
     * @param string $yearNumber
     * @return string
     */
    public function getCorrectYear($yearNumber)
    {
        if ($yearNumber == null) {
            $yearNumber = date('Y');
        }

        return $yearNumber;
    }
} 
