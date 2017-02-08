<?php
/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.7
 * Time: 11.01
 */

namespace tests\hangman;

use hangman\MysqlLevelsDao;
use hangman\MysqlWordDao;
use PHPUnit_Extensions_Database_DataSet_IDataSet;
use PHPUnit_Extensions_Database_DB_IDatabaseConnection;
use tests\hangman\dump\MyApp_DbUnit_ArrayDataSet;

class MysqlWordTest extends \PHPUnit_Extensions_Database_TestCase
{
    protected $db;

    protected function getConnection()
    {
        if ($this->db == null) {
            $this->db = new \PDO('sqlite:' . __DIR__ . '/dump/example-test.db');
            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        return $this->createDefaultDBConnection($this->db, 'testdb');
    }

    protected function getDataSet()
    {
        return $this->createFlatXMLDataSet(__DIR__ . '/dump/words.xml');
    }

    public function test_show_words()
    {
        $this->getConnection();
        $this->getDataSet();

        $wordsDao = new MysqlWordDao($this->db);
        $words = $wordsDao->getWords();

        $this->assertEquals(count($words), 3);
    }

    public function test_show_word()
    {
        $this->getConnection();
        $this->getDataSet();

        $wordDao = new MysqlWordDao($this->db);
        $word = $wordDao->getWord(3);

        $this->assertEquals($word->{'word'}, "very");
    }

}

