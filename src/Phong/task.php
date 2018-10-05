<?php
namespace Vault\Phong;

class Solution
{
    public static function reverseArray($data)
    {
        $arrData = implode(" ", $data);
        return array_reverse($arrData);
    }

    public static function orderArray($data)
    {
        $convert = function ($value) {
            if (gettype($value) == 'integer') {
                return intval($value);
            } elseif (gettype($value) == 'double' || gettype($value) == 'real') {
                return floatval($value);
            } else {
                return 0;
            }
        };
        $convert_arr = array_map($convert, $data);
        return sort($convert_arr);
    }

    public static function getDistance($x, $y)
    {
        return round(sqrt((floatval($x['lat']) - floatval($y['lat'])) ^ 2 + (floatval($x['lon']) - floatval($y['lon'])) ^ 2), 2);

    }

}
