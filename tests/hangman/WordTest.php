<?php
/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.7
 * Time: 09.58
 */

namespace tests\hangman;

use hangman\Factory;
use hangman\WordEntity;
use hangman\WordSerializer;
use hangman\WordJsonResponseBuilder;
use hangman\WordToJsonConverter;

class WordTest extends \PHPUnit_Framework_TestCase
{
    public function test_json_return_count() {
        $json = file_get_contents('http://hangman.dev/word.php/?test-mode=true');
        $data = json_decode($json);

        $this->assertEquals($data->meta->total, 4);
        $this->assertEquals(count($data->{'data'}), 4);
    }

    public  function test_json_return_word() {
        $json = file_get_contents('http://hangman.dev/word.php/?fields[diff]=1?test-mode=true');
        $data = json_decode($json);

        $this->assertEquals(count($data->data->id), 1);
    }
}