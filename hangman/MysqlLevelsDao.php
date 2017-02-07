<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.3
 * Time: 14.35
 */
namespace hangman;

require_once __DIR__ . '/../vendor/autoload.php';

class MysqlLevelsDao implements LevelsDao
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getLevels()
    {
        $posts = array();
        $sql = 'SELECT id, difficulty, description FROM levels ORDER BY id';
        foreach ($this->conn->query($sql) as $row) {
            array_push($posts, (object)['id' => $row['id'], 'difficulty' => $row['difficulty'], 'description' => $row['description']]);
        }
        return $posts;
    }
}
