<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.3
 * Time: 14.00
 */
namespace hangman;

require_once __DIR__ . '/../vendor/autoload.php';

use \hangman\levelsDao;
use \hangman\LevelsToJsonConverter;
use \hangman\wordDao;
use \hangman\WordToJsonConverter;

class Factory
{
    const server = "localhost";
    const db = "hangman";
    const user = "root";
    const pass = "admin";

    public function connect()
    {
        $conn = new \PDO("mysql:host=" . self::server . ";dbname=" . self::db, self::user, self::pass);
        $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return $conn;
    }

    public function getLevelDao()
    {
        return new levelsDao($this->connect());
    }

    public function getConverterToJson()
    {
        return new LevelsToJsonConverter();
    }

    public function getWordDao()
    {
        return new wordDao($this->connect());
    }

    public function getWordConverterToJson()
    {
        return new wordToJsonConverter();
    }
}

