<?php
/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.7
 * Time: 11.01
 */

namespace tests\hangman;


class MysqlLevelsTest extends \PHPUnit_Framework_TestCase
{
    function pdo_ram_connect() {

    }

    public function test_sql() {
        $conn = $this->pdo_ram_connect();
        $this->assertTrue(true);
    }
}