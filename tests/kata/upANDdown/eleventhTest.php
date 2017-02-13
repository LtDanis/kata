<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.9
 * Time: 10.00
 */
include_once __DIR__.'/../../../kata/upANDdown/eleventh.php';

class eleventhTest extends PHPUnit_Framework_TestCase
{
    private function revTest($actual, $expected) {
        $this->assertEquals($expected, $actual);
    }
    public function testBasics() {
        $str = new \upANDdown\eleventh();

        $this->revTest($str->arrange("I am"), "i AM");
        $this->revTest($str->arrange("AM I"), "i AM");
        $this->revTest($str->arrange(""), "");
        $this->revTest($str->arrange("TOM"), "tom");
        $this->revTest($str->arrange("on I came up were so grandmothers"), "i CAME on WERE up GRANDMOTHERS so"); // 4
        $this->revTest($str->arrange("way the my wall them him"), "way THE my WALL him THEM"); // 1
        $this->revTest($str->arrange("turn know great-aunts aunt look A to back"), "turn GREAT-AUNTS know AUNT a LOOK to BACK"); // 2
    }

}