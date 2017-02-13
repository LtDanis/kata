<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.1
 * Time: 14.11
 */
include_once __DIR__.'/../../../kata/OrderWeight/thirteenth.php';

class thirteenthTest extends PHPUnit_Framework_TestCase
{
    private function revTest($actual, $expected) {
        $this->assertEquals($expected, $actual);
    }

    public function testBasics() {
        $strings = new \OrderWeight\thirteenth();

        $this->revTest($strings->orderWeight(""), "");
        $this->revTest($strings->orderWeight("a b c"), null);
        $this->revTest($strings->orderWeight("103 123 4444 99 2000"), "2000 103 123 4444 99");
        $this->revTest($strings->orderWeight("2000 10003 1234000 44444444 9999 11 11 22 123"), "11 11 2000 10003 22 123 1234000 44444444 9999");
    }
}
