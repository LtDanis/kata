<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.2
 * Time: 09.06
 */
namespace SumOfSequence;

class fourth
{
    function sequence_sum($begin, $end, $step) {
        if ($begin > $end) {
            return 0;
        }
        $sum = 0;
        for($i = $begin; $i <= $end; $i += $step ) {
            $sum += $i;
        }
        return $sum;
    }
}
