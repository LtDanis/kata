<?php
/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.7
 * Time: 11.01
 */

namespace tests\hangman;

use tests\hangman\MyApp_DbUnit_ArrayDataSet;

class MysqlLevelsTest extends \PHPUnit_Extensions_Database_TestCase
{
    // only instantiate pdo once for test clean-up/fixture load
    static private $pdo = null;

    // only instantiate PHPUnit_Extensions_Database_DB_IDatabaseConnection once per test
    private $conn = null;

    final public function getConnection()
    {
        if ($this->conn === null) {
            if (self::$pdo == null) {
                self::$pdo = new \PDO('sqlite::memory:');
            }
            $this->conn = $this->createDefaultDBConnection(self::$pdo, ':memory:');
        }

        return $this->conn;
    }

    /**
     * @return MyApp_DbUnit_ArrayDataSet
     */
    protected function getDataSet()
    {
        return new MyApp_DbUnit_ArrayDataSet(
            [
                'levels' => [
                    [
                        'id' => 1,
                        'difficulty' => 'eASY',
                        'description' => 'very easy',
                        'type' => 'levels'
                    ],
                    [
                        'id' => 2,
                        'difficulty' => 'Medium',
                        'description' => 'medium',
                        'type' => 'levels'
                    ],
                    [
                        'id' => 2,
                        'difficulty' => 'Medium',
                        'description' => 'very hard',
                        'type' => 'levels'
                    ],
                ]
            ]
        );
    }

    public function test_sql()
    {
        $this->createFlatXmlDataSet('./dump/dataset.xml');
        $ds = new \PHPUnit_Extensions_Database_DataSet_QueryDataSet($this->getConnection());
        $ds->addTable('levels', 'SELECT * FROM guestbook');

        $this->assertInstanceOf( \PHPUnit_Extensions_Database_DB_IDatabaseConnection::class,  $ds);
    }
}

