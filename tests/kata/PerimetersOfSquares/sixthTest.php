<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.3
 * Time: 09.11
 */
include_once __DIR__.'/../../../kata/PerimetersOfSquares/sixth.php';

class sixthTest extends PHPUnit_Framework_TestCase
{
    private function revTest($actual, $expected) {
        $this->assertEquals($expected, $actual);
    }

    public function testBasics() {
        $perimeter = new \PerimetersOfSquares\sixth(); //loading class

        $this->revTest($perimeter->perimeter(null), "not integer");
        $this->revTest($perimeter->perimeter(false), "not integer");
        $this->revTest($perimeter->perimeter("a"), "not integer");

        $this->revTest($perimeter->perimeter(-1), null);

        $this->revTest($perimeter->perimeter(0), 4);
        $this->revTest($perimeter->perimeter(5), 80);
        $this->revTest($perimeter->perimeter(7), 216);
        $this->revTest($perimeter->perimeter(20), 114624);
        $this->revTest($perimeter->perimeter(30), 14098308);
    }
}

