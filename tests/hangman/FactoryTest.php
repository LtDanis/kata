<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.1
 * Time: 14.11
 */
namespace tests\hangman;

use \hangman\Factory;
use hangman\LevelsDao;
use \hangman\MysqlLevelsDao;
use \hangman\LevelsToJsonConverter;
use \hangman\wordDao;
use \hangman\WordToJsonConverter;


class FactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testBasic()
    {
        $factory = new Factory();

        $this->assertInstanceOf(LevelsDao::class, $factory->getLevelDao());
        $this->assertInstanceOf(LevelsToJsonConverter::class, $factory->getConverterToJson());
        $this->assertInstanceOf(WordDao::class, $factory->getWordDao());
        $this->assertInstanceOf(WordToJsonConverter::class, $factory->getWordConverterToJson());
    }
}
