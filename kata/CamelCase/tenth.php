<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.9
 * Time: 10.01
 */
namespace CamelCase;

class tenth
{
    function camel_case($s) {
        $words = preg_split('/[\s]+/', $s);//preg_split('/ +/', $s);
        $str = "";
        foreach ($words as  $t) {
            if(isset($t[0])) {
                $t[0] = strtoupper($t[0]);
                $str = $str.$t;
            }
        }
        return $str;
    }
}