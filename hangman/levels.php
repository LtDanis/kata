<?php

namespace hangman;

require_once __DIR__ . '/../vendor/autoload.php';

header('Content-Type: application/json');

$factory = new Factory();

$levelsDao = $factory->getLevelDao();
$levels = $levelsDao->getLevels();

$converter = $factory->getConverterToJson();
$builder = new JsonResponseBuilder($converter);
$json = $builder->getResponse($levels);

echo $json;
