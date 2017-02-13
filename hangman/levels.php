<?php

namespace hangman;

require_once __DIR__ . '/../vendor/autoload.php';

header('Content-Type: application/json');

$factory = new Factory();
$levelsDao = $factory->getLevelDao();
$converter = $factory->getConverterToJson();

$builder = new LevelsJsonResponseBuilder($converter, $levelsDao);

$json = $builder->getResponse();

echo $json;























