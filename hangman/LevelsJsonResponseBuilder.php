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
    private $levelsDao;

    public function __construct(Converter $converter, LevelsDao $levels)
    {
        $this->converter = $converter;
        $this->levelsDao = $levels;
    }

    public function getResponse($id = null)
    {
        $entities = $this->levelsDao->getLevels();
        $json = $this->converter->toCollection($entities);
        return $json;
    }
}