<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.1
 * Time: 14.27
 */
namespace Workout;

class third
{
    function pre_fizz($n) {
        $arr = null;
        for($i = 1; $i <= $n; $i++) {
            $arr[$i-1]=$i;
        }
        return $arr;
    }
}