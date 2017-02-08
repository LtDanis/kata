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
use hangman\LevelsJsonResponseBuilder;
use hangman\LevelsToJsonConverter;
use phpDocumentor\Reflection\Types\String_;

class LevelsToJsonConverterTest extends \PHPUnit_Framework_TestCase
{

    public function test_json_builder() {
        $builder = new LevelsToJsonConverter();

        $entity = [(object)['id' => 0, 'difficulty' => "1", 'description' => "easy"]];
        $response = $builder->toCollection($entity);
        $this->assertEquals('{"data":[{"type":"levels","id":"0","attributes":{"difficulty":"1","description":"easy"}}],"meta":{"total":1}}', $response);
    }
}