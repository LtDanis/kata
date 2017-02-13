<?php

namespace hangman;

require_once __DIR__ . '/../vendor/autoload.php';

class MakeLevels
{
    public static function getLevels() {
        $factory = new Factory();
        $levelsDao = $factory->getLevelDao();
        $converter = $factory->getConverterToJson();

        $builder = new LevelsJsonResponseBuilder($converter, $levelsDao);

        return $json = $builder->getResponse();
    }
}























