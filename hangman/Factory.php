<?php

namespace hangman;

class Factory
{
    const server = "localhost";
    const db = "hangman";
    const user = "root";
    const pass = "admin";
    protected $conn = null;

    public function connect()
    {
        if ($this->conn == null) {
            $this->conn = new \PDO("mysql:host=" . self::server . ";dbname=" . self::db, self::user, self::pass);
        }
        $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return $this->conn;
    }

    public function getLevelDao()
    {
        return new MysqlLevelsDao($this->connect());
    }

    public function getConverterToJson()
    {
        return new LevelsToJsonConverter();
    }

    public function getWordDao()
    {
        return new MysqlWordDao($this->connect());
    }

    public function getWordConverterToJson()
    {
        return new WordToJsonConverter();
    }
}