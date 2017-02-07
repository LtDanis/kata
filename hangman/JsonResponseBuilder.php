<?php
/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.7
 * Time: 11.09
 */

namespace hangman;


class JsonResponseBuilder
{
    private $converter;

    public function __construct(LevelsToJsonConverter $converter)
    {
        $this->converter = $converter;
    }

    public function getResponse($entity)
    {
        $json = $this->converter->toCollection($entity);
        return $json;
    }
}