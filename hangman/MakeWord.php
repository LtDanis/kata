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

class MakeWord
{
    public static function getWords() {
        $factory = new Factory();

        $wordDao = $factory->getWordDao();

        $converter = $factory->getWordConverterToJson();
        $builder = new WordJsonResponseBuilder($converter);

        $word = $wordDao->getWords();
        $json = $builder->getResponse($word);

        return $json;
    }

    public static function getWord($diff) {
        try {
            $factory = new Factory();

            $wordDao = $factory->getWordDao();

            $converter = $factory->getWordConverterToJson();
            $builder = new WordJsonResponseBuilder($converter);

            $word = null;
            $json = null;
            //nuskaitomas zodis su GET
            $word = $wordDao->getWord($diff, null);
            if( $word == null ) {
                throw new \Exception('No words on this difficulty', 404);
            }
            $json = $builder->getResource($word);

            echo $json;
        } catch (\Exception $e) {
            $errors = new ErrorHandler;

            $errors->registerHandler(new InvalidParameterExceptionHandler);
            $errors->registerHandler(new FallbackExceptionHandler(1));

            $response = $errors->handle($e);

            $document = new Document;
            $document->setErrors($response->getErrors());
            return $document;
        }
    }
}
