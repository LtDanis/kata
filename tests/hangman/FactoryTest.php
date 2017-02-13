<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.1
 * Time: 14.11
 */

namespace tests\hangman;

use hangman\Converter;
use \hangman\Factory;
use \hangman\LevelsDao;
use \hangman\WordDao;

class FactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testBasic()
    {
        $factory = new Factory();

        $this->assertInstanceOf(LevelsDao::class, $factory->getLevelDao());
        $this->assertInstanceOf(Converter::class, $factory->getConverterToJson());
        $this->assertInstanceOf(WordDao::class, $factory->getWordDao());
        $this->assertInstanceOf(Converter::class, $factory->getWordConverterToJson());
    }
}
