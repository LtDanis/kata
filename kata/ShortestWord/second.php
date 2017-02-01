<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.1
 * Time: 14.10
 */
namespace ShortestWord;

class second
{
    function findShort($str){
        $words = explode(" ", $str);
        $min = strlen($words[0]);
        foreach ($words as $i) {
            if( $min > strlen($i)) {
                $min = strlen($i);
            }
        }
        return $min;
    }
}