<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.7
 * Time: 11.30
 */
namespace GapInPrimes;

class eighth
{
    function gap($g, $m, $n) {
        $arr = array();
        for($i = 0; $i <= $n; $i++) { $arr[$i] = true; }
        for($i = 2; $i <= $n; $i++) {
            for($j = $i * 2; $j < $n; $j += $i) {
                $arr[$j] = false;
            }
        }

        for($i = $m; $i <= $n; $i++) {
            if ($arr[$i] == true) {
                for($j = $i + 1; $j <= $n; $j++) {
                    if($arr[$j] == true) {
                        if((($j - $i) == $g) && ($j <= $n)) {
                            return [$i, $j];
                        }else break;
                    }
                }
            }
        }
        return null;
    }
}