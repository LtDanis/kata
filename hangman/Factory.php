<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.3
 * Time: 14.00
 */
namespace hangman;

include_once 'levelsDao.php';
include_once  'entityToJsonConverter.php';

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
        return new entityToJsonConverter();
    }
}

