<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.2
 * Time: 13.30
 */
namespace Cows;

class fifth
{
    function count_cows($y)
    {
        if ( !is_int($y) ) {
            return null;
        }
        $arr = array(1, 0, 0, 0);
        for ($i = 0; $i < $y; $i++) {
            $arr[3] += $arr[2];
            $arr[2] = $arr[1];
            $arr[1] = $arr[0];
            $arr[0] = $arr[3];
        }
        return array_sum($arr);
    }
}
