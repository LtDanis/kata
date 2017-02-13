<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.3
 * Time: 14.46
 */

namespace hangman;

use Tobscure\JsonApi\Document;
use Tobscure\JsonApi\Collection;

class LevelsToJsonConverter implements Converter
{
    public function toCollection($levelsEntities)
    {
        // Create a new collection of posts, and specify relationships to be included.
        $collection = (new Collection($levelsEntities, new LevelSerializer()));

        // Create a new JSON-API document with that collection as the data.
        $document = new Document($collection);

        // Add metadata.
        $document->addMeta('total', count($levelsEntities));
//        $document->addLink('self', 'http://www.hangman.dev/api/v1/difficulties');
//        $document->addLink('words', 'http://www.hangman.dev/api/v1/words');
//        $document->addLink('test-mode', 'http://www.hangman.dev/api/v1/difficulties?test-mode');

        return json_encode($document);
    }

}
