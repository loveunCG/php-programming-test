<?php
namespace Vault\Phong;

class Solution
{
    public static function reverseArray($data)
    {
        $arrData = explode(" ", $data);
        return array_reverse($arrData);
    }

    public static function orderArray($data)
    {
        $convert = function ($value) {
            if (intval($value) == $value) {
                return intval($value);
            } elseif (floatval($value) == $value) {
                return floatval($value);
            } else {
                return 0;
            }
        };
        $convert_arr = array_map($convert, $data);
        sort($convert_arr);
        return $convert_arr;
    }

    public static function getDistance($x, $y)
    {
        $theta = floatval($x['lon']) - floatval($y['lon']);
        $dist = sin(deg2rad(floatval($x['lat']))) * sin(deg2rad(floatval($y['lat']))) + cos(deg2rad(floatval($x['lat']))) * cos(deg2rad(floatval($y['lat']))) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        return self::round_up($dist * 60 * 1.1515, 2);

    }
    public static function round_up($value, $places)
    {
        $mult = pow(10, abs($places));
        return $places < 0 ?
        ceil($value / $mult) * $mult :
        ceil($value * $mult) / $mult;
    }

    public function distance($lat1, $lon1, $lat2, $lon2, $unit)
    {

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K") {
            return ($miles * 1.609344);
        } else if ($unit == "N") {
            return ($miles * 0.8684);
        } else {
            return $miles;
        }
    }

}
