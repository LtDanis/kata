<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.1
 * Time: 14.11
 */
include_once __DIR__.'/../../../kata/ZeroOrInfinity/seventh.php';

class seventhTest extends PHPUnit_Framework_TestCase
{
    public function testBasics() {
        $count = new \ZeroOrInfinity\seventh();

        $this->assertEquals(1, $count->going(1));
        $this->assertEquals(1.275, $count->going(5));
        $this->assertEquals(1.2125, $count->going(6));
        $this->assertEquals(1.173214, $count->going(7));
        $this->assertEquals(1.146651, $count->going(8));
    }
}
