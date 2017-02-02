<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.2
 * Time: 09.58
 */
include_once '../vendor/autoload.php';
include_once './LevelSerializer.php';

use Tobscure\JsonApi\Document;
use Tobscure\JsonApi\Collection;

header('Content-Type: application/json');

    $posts = [
        (object)['id' => 0, 'difficulty' => "easy", 'description' => "Easy"],
        (object)['id' => 1, 'difficulty' => "medium", 'description' => "Medium"],
        (object)['id' => 2, 'difficulty' => "hard", 'description' => "Hard"]
    ];


// Create a new collection of posts, and specify relationships to be included.
$collection = (new Collection($posts, new LevelSerializer()));

// Create a new JSON-API document with that collection as the data.
$document = new Document($collection);

// Add metadata.
$document->addMeta('total', count($posts));

// Output the document as JSON.
echo json_encode($document);

