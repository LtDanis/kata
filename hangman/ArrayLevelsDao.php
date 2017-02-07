<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.3
 * Time: 14.35
 */
namespace hangman;


class ArrayLevelsDao implements LevelsDao
{
    public function getLevels()
    {
        $posts = array(
            (object)['id' => 1, 'difficulty' => 5, 'description' => 'Sunkumas 5'],
            (object)['id' => 2, 'difficulty' => 3, 'description' => 'Sunkumas 3']
        );

        return $posts;
    }
}
