<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.1
 * Time: 09.08
 */

include_once __DIR__.'/../../../kata/Sq2Squares/twelfth.php';

class twelfthTest extends PHPUnit_Framework_TestCase
{

        private function revTest($actual, $expected) {
            $this->assertEquals($expected, $actual);
        }
        public function testBasic() {
            $sq = new \Sq2Squares\twelfth();
            $this->revTest($sq->decompose(-5), null);
            $this->revTest($sq->decompose(0), [0]);
            $this->revTest($sq->decompose(1), [1]);
//            $this->revTest($sq->decompose(2), null);
//            $this->revTest($sq->decompose(5), [3,4]);
//            $this->revTest($sq->decompose(50), [1,3,5,8,49]);
//            $this->revTest($sq->decompose(44), [2,3,5,7,43]);
        }
}
