<?php
/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.7
 * Time: 11.09
 */

namespace hangman;


class LevelsJsonResponseBuilder implements Builder
{
    private $converter;

    public function __construct(LevelsToJsonConverter $converter)
    {
        $this->converter = $converter;
    }

    public function getCollection($entities)
    {
        $json = $this->converter->toCollection($entities);
        return $json;
    }
}