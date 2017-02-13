<?php

namespace hangman;

use \hangman\WordSerializer;
use Tobscure\JsonApi\Relationship;
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
//            ->with(['levels']);

        // Create a new JSON-API document with that collection as the data.
        $document = new Document($collection);

        // Add metadata.
        $document->addMeta('total', count($wordEntities));
//        $document->addLink('self', 'http://www.hangman.dev/api/v1/words');
//        $document->addLink('levels', 'http://www.hangman.dev/api/v1/difficulties');
//        $document->addLink('test-mode', 'http://www.hangman.dev/api/v1/words?test-mode');

        return json_encode($document);
    }
}
