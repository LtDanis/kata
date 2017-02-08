<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.1
 * Time: 14.11
 */
include_once __DIR__.'/../../../kata/ConsecutiveStrings/ninth.php';

class ninthTest extends PHPUnit_Framework_TestCase
{
    private function revTest($actual, $expected) {
        $this->assertEquals($expected, $actual);
    }

    public function testBasics() {
        $strings = new \ConsecutiveStrings\ninth();

        $this->revTest($strings->longestConsec(["zone", "abigail", "theta"], 4), "");
        $this->revTest($strings->longestConsec(["zone", "abigail", "theta"], 0), "");
        $this->revTest($strings->longestConsec(["zone", "abigail", "theta"], 3), "zoneabigailtheta");
        $this->revTest($strings->longestConsec(["zone", "abigail", "theta", "form", "libe", "zas"], 2), "abigailtheta");
        $this->revTest($strings->longestConsec(["ejjjjmmtthh", "zxxuueeg", "aanlljrrrxx", "dqqqaaabbb", "oocccffuucccjjjkkkjyyyeehh"], 1), "oocccffuucccjjjkkkjyyyeehh");
        $this->revTest($strings->longestConsec([], 3), "");
    }
}
