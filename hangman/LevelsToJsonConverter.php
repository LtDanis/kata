<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.3
 * Time: 14.46
 */
namespace hangman;

require_once __DIR__ . '/../vendor/autoload.php';

use Tobscure\JsonApi\Document;
use Tobscure\JsonApi\Collection;

class LevelsToJsonConverter
{
    public function toCollection($posts)
    {
        // Create a new collection of posts, and specify relationships to be included.
        $collection = (new Collection($posts, new LevelSerializer()));

        // Create a new JSON-API document with that collection as the data.
        $document = new Document($collection);

        // Add metadata.
        $document->addMeta('total', count($posts));

        return $document;
    }

}
