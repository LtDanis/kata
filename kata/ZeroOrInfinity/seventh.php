<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.6
 * Time: 10.50
 */
namespace ZeroOrInfinity;

class seventh
{
    function going($n) {
        $arr = array(1);
        for( $i = 1; $i < $n; $i++) {
            $arr[$i] = $arr[$i-1] * ($i + 1);
        }
        $res = array_sum($arr)/$arr[$n-1];
        return $number = floor(($res*1000000))/1000000;
    }
}
