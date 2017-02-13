<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.9
 * Time: 10.01
 */
namespace Sq2Squares;

class twelfth
{
    public function decompose($n)
    {
        if ($n < 0) {
        return null;
        }
        if ($n == 0) {
            return [0];
        }
        if ($n == 1) {
            return [1];
        }
        return $this->findLower($n*$n,$n);
    }

    //neveikia
    public function findLower($s, $n) {
        for ($i = $n - 1; $i > 0; $i--) {
            if ($s == 0) {
                return $i;
            }
            echo $i."\n";
            array_push($sub, $this->findLower($s - $i*$i, $i));

        }
    }
}