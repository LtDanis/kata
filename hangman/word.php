<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.2
 * Time: 12.19
 */
namespace hangman;

require_once __DIR__ . '/../vendor/autoload.php';

use Tobscure\JsonApi\ErrorHandler;
use Tobscure\JsonApi\Document;
use Tobscure\JsonApi\Exception\Handler\InvalidParameterExceptionHandler;
use Tobscure\JsonApi\Exception\Handler\FallbackExceptionHandler;
use Tobscure\JsonApi\Parameters;

header('Content-Type: application/json');

try {
    $factory = new Factory();

    $wordDao = $factory->getWordDao();

    $converter = $factory->getWordConverterToJson();
    $builder = new WordJsonResponseBuilder($converter);

    $parameters = new Parameters($_GET);
    $fields = $parameters->getFields();

    $word = null;
    $json = null;
    if (isset($fields['diff'][0])) {
        //nuskaitomas zodis su GET
        $word = $wordDao->getWord($fields['diff'][0], null);
        if( $word == null ) {
            throw new \Exception('No words on this difficulty', 404);
        }
        $json = $builder->getResource($word);
    } else {
        //likusiu atveju visi imanomi zodziai
        $word = $wordDao->getWords();
        $json = $builder->getCollection($word);
    }

    echo $json;

} catch (\Exception $e) {
    $errors = new ErrorHandler;

    $errors->registerHandler(new InvalidParameterExceptionHandler);
    $errors->registerHandler(new FallbackExceptionHandler(1));

    $response = $errors->handle($e);

    $document = new Document;
    $document->setErrors($response->getErrors());
    echo $document;
}

