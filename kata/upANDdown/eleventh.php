<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.9
 * Time: 10.01
 */
namespace upANDdown;

class eleventh
{
    function arrange($strng)
    {
        $words = explode(' ', $strng);
        if(count($words) <= 1) {
            if($words[0] == " ") {
                return "";
            }
            return strtolower($words[0]);
        }
        for ($i = 0; $i < count($words) - 1; $i++) {
            $word = $words[$i];
            $next = $words[$i + 1];
            $swap = strlen($word) != strlen($next) && ($i % 2 xor strlen($word) > strlen($next));
            if ($swap) {
                $words[$i] = $next;
                $words[$i + 1] = $word;
            }
            $words[$i] = $i % 2 ? strtoupper($words[$i]) : strtolower($words[$i]);
            $words[$i + 1] = $i % 2 ? strtolower($words[$i + 1]) : strtoupper($words[$i + 1]);
            if($words[$i] == " ") {
                $words[$i] = "";
            }
        }
        return implode(' ', $words);
    }
}