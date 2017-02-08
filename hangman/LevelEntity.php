<?php
namespace hangman;

require_once __DIR__ . '/../vendor/autoload.php';

class LevelEntity
{
    public $id, $difficulty, $description;

    /**
     * LevelEntity constructor.
     * @param $id
     * @param $difficulty
     * @param $description
     */
    public function setData($id, $difficulty, $description)
    {
        $this->id = $id;
        $this->difficulty = $difficulty;
        $this->description = $description;
    }

}