<?php
/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.7
 * Time: 11.10
 */

namespace hangman;


class WordJsonResponseBuilder implements Builder
{
    private $converter;

    public function __construct(WordToJsonConverter $converter)
    {
        $this->converter = $converter;
    }

    public function getCollection($entities)
    {
        $json = $this->converter->toCollection($entities);
        return $json;
    }

    public function getResource($entity)
    {
        $json = $this->converter->toResource($entity);
        return $json;
    }
}