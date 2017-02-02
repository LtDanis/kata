<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.1
 * Time: 14.11
 */
include_once __DIR__.'/../../../kata/Cows/fifth.php';

class fifthTest extends PHPUnit_Framework_TestCase
{
    public function testBasic() {
        $cows = new \Cows\fifth();

        $this->assertEquals(1, $cows->count_cows(0));
        $this->assertEquals(null, $cows->count_cows(0.75));
        $this->assertEquals(1, $cows->count_cows(1));
        $this->assertEquals(2, $cows->count_cows(3));
        $this->assertEquals(4, $cows->count_cows(5));
    }
}
