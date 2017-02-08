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
use hangman\WordJsonResponseBuilder;

class WordJsonResponseBuilderTest extends \PHPUnit_Framework_TestCase
{

    public function test_json_builder() {
        $factory = new Factory();
        $converter = $factory->getWordConverterToJson();
        $builder = new WordJsonResponseBuilder($converter);

        $entity = [(object)['id'=>0,'levelId' =>1,'word'=>"asd"]];
        $response = $builder->getResource($entity[0]);
        $responseA = $builder->getCollection($entity);

        $this->assertInstanceOf(Converter::class, $converter);
        $this->assertInstanceOf(Builder::class, $builder);
        $this->assertStringStartsWith('{"data":{"', $response);
        $this->assertStringStartsWith('{"data":[{"', $responseA);

    }
}