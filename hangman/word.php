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

header('Content-Type: application/json');

class WordJsonResponseBuilder
{
    private $converter;

    public function __construct(WordToJsonConverter $converter)
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

    //throw new InvalidParameterException("ID is required parameter");

    $wordDao = $factory->getWordDao();

    if (isset($_GET['diff'])) { //ar gerai?
        $word = $wordDao->getWord($_GET['diff']); //jei turi GET metoda su diff parametrais
        if ($word == null) {
            throw new \Exception('No words on this difficulty');
        }
    } else {
        $word = $wordDao->getWords(); //likusiu atveju visi imanomi zodziai
    }

    $converter = $factory->getWordConverterToJson();
    $builder = new WordJsonResponseBuilder($converter);
    $json = $builder->getResponse($word);
    echo $json;

} catch (\Exception $e) {
    $errors = new ErrorHandler;

    $errors->registerHandler(new InvalidParameterExceptionHandler);
    $errors->registerHandler(new \HangmanException());
    //$errors->registerHandler(new FallbackExceptionHandler(1));

    $response = $errors->handle($e);

    $document = new Document;
    $document->setErrors($response->getErrors());
    echo $document;

    //return new JsonResponse($document, $response->getStatus());
}
