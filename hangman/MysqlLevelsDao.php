<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.3
 * Time: 14.35
 */

namespace hangman;

class MysqlLevelsDao implements LevelsDao
{
    private $conn;

    public function __construct(\PDO $conn)
    {
        $this->conn = $conn;
    }

    public function getLevels()
    {
        $sql = 'SELECT id, difficulty, description FROM levels ORDER BY id';

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $posts = $stmt->fetchAll(\PDO::FETCH_CLASS, LevelEntity::class);

        return $posts;
    }
}
