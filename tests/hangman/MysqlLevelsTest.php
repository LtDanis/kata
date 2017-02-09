<?php
/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.7
 * Time: 11.01
 */

namespace tests\hangman;

use hangman\MysqlLevelsDao;
use PHPUnit_Extensions_Database_DataSet_IDataSet;
use PHPUnit_Extensions_Database_DB_IDatabaseConnection;

class MysqlLevelsTest extends \PHPUnit_Extensions_Database_TestCase
{
    protected $db;

    protected function getConnection()
    {
        $this->db = new \PDO('sqlite:' . __DIR__ . '/dump/example-test.db');
        $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return $this->createDefaultDBConnection($this->db, 'testdb');
    }
    protected function getDataSet()
    {
        return $this->createFlatXMLDataSet(__DIR__ . '/dump/levels.xml');
    }

    public function test_show_levels() {
        $this->getConnection();
        $this->getDataSet();

        $levelsDao = new MysqlLevelsDao($this->db);
        $levels = $levelsDao->getLevels();

        $this->assertEquals(count($levels), 3);
    }

    public function getData() {
        $this->getConnection();
        $this->getDataSet();

        $levelsDao = new MysqlLevelsDao($this->db);

        return $levelsDao->getLevels();
    }
}

