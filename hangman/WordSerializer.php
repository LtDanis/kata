<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.2
 * Time: 11.34
 */

namespace hangman;

require_once __DIR__ . '/../vendor/autoload.php';

use Tobscure\JsonApi\AbstractSerializer;
use Tobscure\JsonApi\Collection;
use Tobscure\JsonApi\Relationship;

class WordSerializer extends AbstractSerializer
{
    protected $type = 'words';

//    public function levels($post)
//    {
//        $levels = [
//            new LevelEntity()
//        ];
//
//        $element = new Collection($levels, new LevelSerializer());
//
//        return new Relationship($element);
//    }

    public function getAttributes($post, array $fields = null)
    {
        return [
            'difficulty' => $post->levelId,
            'word' => $post->word,
        ];
    }
}
