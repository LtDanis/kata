<?php
/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.7
 * Time: 14.34
 */

namespace tests\hangman;


use hangman\Converter;
use hangman\Factory;
use hangman\WordJsonResponseBuilder;
use hangman\WordToJsonConverter;
use phpDocumentor\Reflection\Types\String_;

class WordToJsonConverterTest extends \PHPUnit_Framework_TestCase
{

    public function test_json_builder() {
        $builder = new WordToJsonConverter();

        $entity = [(object)['id' => 0, 'levelId' => "1", 'word' => "easy"]];

        $responseA = $builder->toCollection($entity);
        $responseE = $builder->toResource($entity[0]);

        $this->assertEquals('{"data":[{"type":"words","id":"0","attributes":{"difficulty":"1","word":"easy"}}],"meta":{"total":1}}', $responseA);
        $this->assertEquals('{"data":{"type":"words","id":"0","attributes":{"difficulty":"1","word":"easy"}}}', $responseE);
    }
}