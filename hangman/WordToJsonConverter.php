<?php

namespace hangman;

require_once __DIR__ . '/../vendor/autoload.php';

use \hangman\WordSerializer;
use Tobscure\JsonApi\Resource;
use Tobscure\JsonApi\Document;
use Tobscure\JsonApi\Collection;

class WordToJsonConverter implements Converter
{
    public function toResource($wordEntity)
    {

        $resource = new Resource($wordEntity, new WordSerializer());
        $document = new Document($resource);
        return json_encode($document);
    }

    public function toCollection($wordEntities)
    {
        // Create a new collection of posts, and specify relationships to be included.
        $collection = (new Collection($wordEntities, new WordSerializer()));

        // Create a new JSON-API document with that collection as the data.
        $document = new Document($collection);

        // Add metadata.
        $document->addMeta('total', count($wordEntities));

        return json_encode($document);
    }

}
