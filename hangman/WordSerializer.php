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

class WordSerializer extends AbstractSerializer
{
    protected $type = 'words';

    public function getAttributes($post, array $fields = null)
    {
        return [
            'difficulty' => $post->levelId,
            'word' => $post->word,
        ];
    }
}
