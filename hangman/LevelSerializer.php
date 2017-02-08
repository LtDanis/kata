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

class LevelSerializer extends AbstractSerializer
{
    protected $type = 'levels';

    public function getAttributes($post, array $fields = null)
    {
        return [
            'difficulty' => $post->difficulty,
            'description' => $post->description,
        ];
    }
}
