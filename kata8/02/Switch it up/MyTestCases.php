<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.1
 * Time: 09.08
 */
class MyTestCases
{
    public function test_static_operations()
    {
        $this->assertEquals(switch_it_up(1),"One");
        $this->assertEquals(switch_it_up(3),"Three");
        $this->assertEquals(switch_it_up(5),"Five");
        $this->assertEquals(switch_it_up(15),"NaN");

    }
}