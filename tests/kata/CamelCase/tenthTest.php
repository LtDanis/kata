<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.9
 * Time: 10.00
 */
include_once __DIR__.'/../../../kata/CamelCase/tenth.php';

class tenthTest extends PHPUnit_Framework_TestCase
{
    public function testFixed() {
        $camel = new \CamelCase\tenth();
        $this->assertEquals("TestCase", $camel->camel_case("test case"));
        $this->assertEquals("TestCase", $camel->camel_case("test   case"));
        $this->assertEquals("TestCase", $camel->camel_case("testCase"));
        $this->assertEquals("CamelCaseMethod", $camel->camel_case("camel case method"));
        $this->assertEquals("SayHello", $camel->camel_case("say hello "));
        $this->assertEquals("CamelCaseWord", $camel->camel_case(" camel case word"));
        $this->assertEquals("", $camel->camel_case(""));
    }

}