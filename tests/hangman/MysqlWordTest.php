<?php
/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.7
 * Time: 11.01
 */

namespace tests\hangman;

use hangman\MysqlWordDao;
use PHPUnit_Extensions_Database_DataSet_IDataSet;
use PHPUnit_Extensions_Database_DB_IDatabaseConnection;

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

    public function test_count_words()
    {
        $wordsDao = new MysqlWordDao($this->db);
        $words = $wordsDao->getWords();

        $this->assertEquals(3, count($words));
    }

    public function test_find_word()
    {
        $wordDao = new MysqlWordDao($this->db);
        $word = $wordDao->getWord(3, true);

        $this->assertEquals($word->word, "very");
    }

}

