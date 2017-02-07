<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.2
 * Time: 09.58
 */
namespace hangman;

require_once __DIR__ . '/../vendor/autoload.php';

header('Content-Type: application/json');

class JsonResponseBuilder
{
    private $converter;

    public function __construct(LevelsToJsonConverter $converter)
    {
        $this->converter = $converter;
    }

    public function getResponse($entity)
    {
        $json = $this->converter->toCollection($entity);
        return $json;
    }
}

try {
    $factory = new Factory();


    $levelsDao = $factory->getLevelDao();
    $levels = $levelsDao->getLevels();

    $converter = $factory->getConverterToJson();
    $builder = new JsonResponseBuilder($converter);
    $json = $builder->getResponse($levels);
    echo $json;


} catch (\Exception $e) {
    //return jsonui eee
}
