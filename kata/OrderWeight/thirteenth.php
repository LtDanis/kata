<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.9
 * Time: 10.01
 */

namespace OrderWeight;

class thirteenth
{
    function orderWeight($str) {
        if($str == "") {
            return "";
        }
        $nums = explode(" ", $str);
        $l = count($nums);
        $sum = array();
        foreach($nums as $key => $num) {
            $tsum = 0;
            for($i = 0; $i < strlen($num); $i++) {

                if($num[$i] >= '0' && $num[$i] <= '9') {
                    $tsum += intval($num[$i]);
                }else return null;


            }
            $sum[$key] = $tsum;
        }
        for($i = 0; $i < $l; $i++) {
            for($j = 0; $j < ($l-$i-1);$j++){
                if($sum[$j] > $sum[$j+1]) {
                    $tn = $nums[$j];
                    $ts = $sum[$j];

                    $nums[$j] = $nums[$j+1];
                    $sum[$j] = $sum[$j+1];

                    $nums[$j+1] = $tn;
                    $sum[$j+1] = $ts;
                }
                if($sum[$j] == $sum[$j+1]) {
                    if($nums[$j][0] > $nums[$j+1][0]) {
                        $tn = $nums[$j];
                        $nums[$j] = $nums[$j + 1];
                        $nums[$j + 1] = $tn;
                    }
                }
            }
        }
        return implode(' ', $nums);
    }
}