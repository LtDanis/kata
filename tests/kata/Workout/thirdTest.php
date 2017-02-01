<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.1
 * Time: 14.29
 */
include_once __DIR__.'/../../../kata/Workout/third.php';

class thirdTest extends PHPUnit_Framework_TestCase
{
    public function testExamples() {
        $arr = new \Workout\third();

        $this->assertEquals([1], $arr->pre_fizz(1));
        $this->assertEquals([1, 2], $arr->pre_fizz(2));
        $this->assertEquals([1, 2, 3], $arr->pre_fizz(3));
        $this->assertEquals([1, 2, 3, 4], $arr->pre_fizz(4));
        $this->assertEquals([1, 2, 3, 4, 5], $arr->pre_fizz(5));
    }
}
