<?php

namespace hangman;

class Factory
{
    protected $server, $user, $pass, $db;
    protected $conn = null;

    public function connect()
    {
        if ($this->conn == null) {
            $this->checkParameters();
            $this->conn = new \PDO("mysql:host=" . $this->server . ";dbname=" . $this->db, $this->user, $this->pass);
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

    public function setParams($server, $user, $password, $db)
    {
        $this->server = $server;
        $this->user = $user;
        $this->pass = $password;
        $this->db = $db;
    }

    public function checkParameters()
    {
        if (isset($_GET['test-mode'])) {
            $this->setParams("localhost", "root", "admin", "testdb");
        } else {
            $this->setParams("localhost", "root", "admin", "hangman");
        }
    }
}