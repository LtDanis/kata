<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.3
 * Time: 14.35
 */
namespace hangman;

class wordDao
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getWord($diff)
    {
        $posts = array();

        $sql = $this->conn->prepare("SELECT id, word FROM words WHERE :diff = levelId ORDER BY RAND()");
        $sql->bindValue(':diff', $diff);
        $sql->execute();
        $row = $sql->fetch(\PDO::FETCH_ASSOC);
        array_push($posts, (object)['id' => $row['id'], 'difficulty' => $diff, 'word' => $row['word']]);

        if($row['id'] == null) {
            return null;
        }else {
            return $posts;
        }
    }

    public function getWords()
    {
        $posts = array();

        $sql = "SELECT words.id, words.word, words.levelId FROM words INNER JOIN levels ON levels.id = words.levelId ORDER BY words.id";
        foreach ($this->conn->query($sql) as $row) {
            array_push($posts, (object)['id' => $row['id'], 'difficulty' => $row['levelId'], 'word' => $row['word']]);
        }

        return $posts;
    }
}
