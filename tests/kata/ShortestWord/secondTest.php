<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.1
 * Time: 14.11
 */
include_once __DIR__.'/../../../kata/ShortestWord/second.php';

class secondTest extends PHPUnit_Framework_TestCase
{
    // test function names should start with "test"
    public function testBasics() {
        $find = new \ShortestWord\second();

        $this->assertEquals($find->findShort("bitcoin take over the world maybe who knows perhaps"), 3);
        $this->assertEquals($find->findShort("turns out random test cases are easier than writing out basic ones"), 3);
        $this->assertEquals($find->findShort("bitcoin take over world maybe knows perhaps"), 4);
        $this->assertEquals($find->findShort(" "), 0);
        $this->assertEquals($find->findShort(""), 0);
    }
}