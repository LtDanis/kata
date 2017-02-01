<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.1
 * Time: 09.08
 */

include_once __DIR__.'/../../../kata/SwitchItUp/first.php';

class firstTest extends PHPUnit_Framework_TestCase
{

    public function test_static_operations()
    {
        $switchItUp = new \SwitchItUp\first();

        $this->assertEquals("One", $switchItUp->switch_it_up(1));
        $this->assertEquals("Three", $switchItUp->switch_it_up(3));
        $this->assertEquals("Five", $switchItUp->switch_it_up(5));
        $this->assertEquals("NaN", $switchItUp->switch_it_up(15));
    }
}