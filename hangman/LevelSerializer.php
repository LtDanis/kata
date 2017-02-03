<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.2
 * Time: 11.34
 */
namespace hangman;

include_once '../vendor/autoload.php';

use Tobscure\JsonApi\AbstractSerializer;

class LevelSerializer extends AbstractSerializer
{
    protected $type = 'levels';

    public function getAttributes($post, array $fields = null)
    {
        return [
            'diffuculty' => $post->difficulty,
            'description' => $post->description,
        ];
    }
}
