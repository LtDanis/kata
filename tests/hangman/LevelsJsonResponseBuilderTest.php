<?php
/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.7
 * Time: 14.34
 */

namespace tests\hangman;


use hangman\Builder;
use hangman\Converter;
use hangman\Factory;
use hangman\LevelsJsonResponseBuilder;
use hangman\LevelsToJsonConverter;

class LevelsJsonResponseBuilderTest extends \PHPUnit_Framework_TestCase
{

    public function test_json_builder() {
        $factory = new Factory();
        $converter = $factory->getConverterToJson();
        $builder = new LevelsJsonResponseBuilder($converter);

        $entity = [(object)['id'=>0,'difficulty' =>1,'description'=>""]];
        $response = $builder->getCollection($entity);

        $this->assertInstanceOf(Converter::class, $converter);
        $this->assertInstanceOf(Builder::class, $builder);
        $this->assertStringStartsWith("{", $response);

    }
}