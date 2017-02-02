<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.2
 * Time: 11.34
 */
include_once '../vendor/autoload.php';

use Tobscure\JsonApi\AbstractSerializer;

class WordSerializer extends AbstractSerializer
{
    protected $type = 'words';

    public function getAttributes($post, array $fields = null)
    {
        return [
            'difficulty' => $post->difficulty,
            'word' => $post->word,
        ];
    }
}
