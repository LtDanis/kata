<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.1
 * Time: 14.11
 */
include_once __DIR__.'/../../../kata/GapInPrimes/eighth.php';

class eighthTest extends PHPUnit_Framework_TestCase
{
    private function revTest($actual, $expected) {
        $this->assertEquals($expected, $actual);
    }
    public function testBasics() {
        $gap = new \GapInPrimes\eighth();

        $this->revTest($gap->gap(3,1,3), null);
        $this->revTest($gap->gap(2,8,10), null);
        $this->revTest($gap->gap(2,100,110), [101, 103]);
        $this->revTest($gap->gap(4,100,110), [103, 107]);
        $this->revTest($gap->gap(6,100,110), null);
        $this->revTest($gap->gap(8,300,400), [359, 367]);
        $this->revTest($gap->gap(10,300,400), [337, 347]);
    }
}
