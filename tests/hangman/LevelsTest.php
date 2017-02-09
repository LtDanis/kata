<?php
/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.7
 * Time: 09.58
 */

namespace tests\hangman;

use hangman\Factory;
use hangman\LevelEntity;
use hangman\LevelSerializer;
use hangman\LevelsJsonResponseBuilder;
use hangman\LevelsToJsonConverter;

class LevelsTest extends \PHPUnit_Framework_TestCase
{
    public function test_json_return_count() {
        $json = file_get_contents('http://hangman.dev/levels.php/?test-mode=true');
        $data = json_decode($json);

        $this->assertEquals($data->meta->total, 6);
        $this->assertEquals(count($data->{'data'}), 6);
    }
}