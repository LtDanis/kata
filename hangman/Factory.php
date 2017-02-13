<?php

namespace hangman;

class Factory
{
    protected $conn = null;

    public function connect()
    {
        if ($this->conn == null) {
            $params = $this->getParams();
            $this->conn = new \PDO("mysql:host=" . $params->server . ";dbname=" . $params->db, $params->user, $params->pass);
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

    public function getParams()
    {
        if (isset($_GET['test-mode'])) {
            $params = (object)array(
                'server' => 'localhost',
                'user' => 'root',
                'pass' => 'admin',
                'db' => 'testdb'
            );
        } else {
            $params = (object)array(
                'server' => 'localhost',
                'user' => 'root',
                'pass' => 'admin',
                'db' => 'hangman'
            );
        }
        return $params;
    }
}