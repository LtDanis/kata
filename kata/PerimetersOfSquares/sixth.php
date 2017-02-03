<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.3
 * Time: 09.17
 */
namespace PerimetersOfSquares;

class sixth
{
    function perimeter($n) {
        if(!is_int($n)) {
            return "not integer";
        }
        if ($n < 0) {
            return null;
        }
        if ($n <= 1) {
            return 4;
        }
        $arr = array(1, 1);
        for ($i = 2; $i <= $n; $i++) {
            $arr[$i] = $arr[$i - 2] + $arr[$i - 1];
        }
        return 4 * array_sum($arr);
    }
}

