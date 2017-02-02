<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.2
 * Time: 12.19
 */
include_once '../vendor/autoload.php';
include_once './WordSerializer.php';

use Tobscure\JsonApi\Document;
use Tobscure\JsonApi\Collection;

header('Content-Type: application/json');

    /*try {
        $option = $_GET['option'];
    } catch (Exception $e) {
        $errors = new ErrorHandler;

        $errors->registerHandler(new InvalidParameterExceptionHandler);
        $errors->registerHandler(new FallbackExceptionHandler);

        $response = $errors->handle($e);

        $document = new Document;
        $document->setErrors($response->getErrors());

        return new JsonResponse($document, $response->getStatus());
    }*/


    if (isset($_GET['option'])) {
        $option = $_GET['option'];
    } else {
        $option = 0;
    }

    switch ($option) {
        case 0:
            $id = 0;
            $difficulty = "NA";
            $word = "NA";
            break;
        case 1:
            $id = 1;
            $difficulty = "easy";
            $word = "lol";
            break;
        default:
            $id = 2;
            $difficulty = "medium";
            $word = "abc";
            break;
    }

    $posts = [
        (object)['id' => $id, 'difficulty' => $difficulty, 'word' => $word]
    ];


// Create a new collection of posts, and specify relationships to be included.
$collection = (new Collection($posts, new WordSerializer()));

// Create a new JSON-API document with that collection as the data.
$document = new Document($collection);

// Output the document as JSON.
echo json_encode($document);