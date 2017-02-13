<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.2
 * Time: 11.34
 */
namespace hangman;

use Tobscure\JsonApi\AbstractSerializer;

class LevelSerializer extends AbstractSerializer
{
    protected $type = 'levels';

    public function getAttributes($level, array $fields = null)
    {
        return [
            'difficulty' => $level->difficulty,
            'description' => $level->description,
        ];
    }
}
