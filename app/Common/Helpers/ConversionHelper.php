<?php

namespace App\Common\Helpers;

class ConversionHelper
{
    public static function convertToDescription($value)
    {
        if ($value <=60 ) {
            return 'Kurang';
        } elseif ($value >= 61 && $value <= 70) {
            return 'Cukup';
        } elseif ($value >= 71 && $value <= 80) {
            return 'Memuaskan';
        } elseif ($value >= 81 && $value <= 90) {
            return 'Baik Sekali';
        } elseif ($value >= 91 && $value <= 100) {
            return 'Luar Biasa';
        } else {
            return 'N/A';
        }
    }
}
