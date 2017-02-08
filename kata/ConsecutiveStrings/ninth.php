<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.2
 * Time: 13.30
 */
namespace ConsecutiveStrings;

class ninth
{
    function longestConsec($strarr, $k) {
        $str = "";
        $sum[0] = 0;
        $len = array();

        if(($k > count($strarr)) || ($k == 0)) { return ""; }

        for($i = 0; $i < count($strarr); $i++) {
            $len[$i] = strlen($strarr[$i]); //zodziu ilgiai
        }

        if($k == 1) {
            $maxV = array_keys($len, max($len));
            return $strarr[$maxV[0]];
        }

        for($i = 0; $i < $k; $i++) { $sum[0] += $len[$i]; } //pirmas zodziu ilgis

        for($i = 1; $i < (count($strarr) - $k); $i++) {
            $sum[$i] = $sum[$i - 1] -  $len[$i - 1] + $len[$i + $k];
        }

        $max = $sum[0];
        $start = 0;
        foreach ($sum as $key => $value) {
            if ($value >= $max) {
                $max = $value;
                $start = $key;
            }
        }

        for($i = $start; $i < ($start + $k); $i++) {
            $str = $str.$strarr[$i];
        }

        return $str;
    }
}
