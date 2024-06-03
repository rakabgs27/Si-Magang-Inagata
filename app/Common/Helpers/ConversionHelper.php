<?php

namespace App\Common\Helpers;

class ConversionHelper
{
    public static function convertToDescription($value)
    {
        switch ($value) {
            case 60:
                return 'Kurang';
            case 70:
                return 'Cukup';
            case 80:
                return 'Memuaskan';
            case 90:
                return 'Baik Sekali';
            case 100:
                return 'Luar Biasa';
            default:
                return 'N/A';
        }
    }
}
