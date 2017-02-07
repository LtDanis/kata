<?php
/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.7
 * Time: 11.10
 */

namespace hangman;


class WordJsonResponseBuilder
{
    private $converter;

    public function __construct(WordToJsonConverter $converter)
    {
        $this->converter = $converter;
    }

    public function getResponse($entity)
    {
        $json = $this->converter->toCollection($entity);
        return $json;
    }
}