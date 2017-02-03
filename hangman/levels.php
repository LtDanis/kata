<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.2
 * Time: 09.58
 */
namespace hangman;

include_once './Factory.php';

header('Content-Type: application/json');

try {
    $factory = new Factory();

    $levelsDao = $factory->getLevelDao();
    $levels = $levelsDao->getLevels();

    $converter = $factory->getConverterToJson();
    $json = $converter->entityToJsonConverter($levels);

    echo $json;
    
} catch (\Exception $e) {
    //return jsonui eee
}
