<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.3
 * Time: 14.35
 */
namespace hangman;

class MysqlWordDao implements WordDao
{
    private $conn;

    public function __construct(\PDO $conn)
    {
        $this->conn = $conn;
    }

    public function getWord($diff)
    {
        $sql = $this->conn->prepare("SELECT words.id, words.word, words.levelId FROM words WHERE :diff = levelId ORDER BY RANDOM() LIMIT 1");
        $sql->bindValue(':diff', $diff, \PDO::PARAM_INT);
        $sql->execute();
        $post = $sql->fetchAll(\PDO::FETCH_CLASS, WordEntity::class);

        if($post == null) {
            return null;
        }else {
            return $post[0];
        }
    }

    public function getWords()
    {
        $sql = "SELECT words.id, words.word, words.levelId FROM words LEFT JOIN levels ON levels.id = words.levelId ORDER BY words.id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $posts = $stmt->fetchAll(\PDO::FETCH_CLASS, WordEntity::class);

        return $posts;
    }
}
