<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.2
 * Time: 09.30
 */
include_once __DIR__.'/../../../kata/SumOfSequence/fourth.php';

class fourthTest extends PHPUnit_Framework_TestCase
{
    public function testExamples() {
        $seq = new \SumOfSequence\fourth();

        $this->assertEquals(12, $seq->sequence_sum(2, 6, 2));
        $this->assertEquals(15, $seq->sequence_sum(1, 5, 1));
        $this->assertEquals(5, $seq->sequence_sum(1, 5, 3));
        $this->assertEquals(0, $seq->sequence_sum(10, 5, 3));
    }
}

