<?php

namespace App\Helpers;

class NumberHelper
{
    public static function leadingZero($number, $format = "%013d")
    {
        return sprintf($format, $number);
    }
}