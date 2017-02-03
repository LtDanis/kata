<?php

/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.2
 * Time: 12.19
 */
include_once '../vendor/autoload.php';
include_once './WordSerializer.php';

use Tobscure\JsonApi\Document;
use Tobscure\JsonApi\Collection;

header('Content-Type: application/json');

$DIFFICULTY=5;

//$freimwork->get('/word/:d', function($request, $response) {

//$wordDao=Factory::getWordDao();
//$wordEntity = $wordDao->getRandomWord($DIFFICULTY);
//$entityToJsonConverter=Factory::getConverterWordToJson();
//return $json = $entityToJsonConverter->convert($wordEntity);
//    $response->write($json);
//}//fetch() grazink duomenis ir sukonvertuok i WordeEtity


    $posts = array();
    try {
        $conn = new PDO("mysql:host=localhost;dbname=hangman", "root", "admin");
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
    $posts = array();

    if (isset($_GET['diff'])) {
        $option = $_GET['diff'];
        $sql = $conn->prepare("SELECT id, word FROM words WHERE $option = levelId ORDER BY RAND()");
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        array_push($posts, (object)['id' => $row['id'], 'difficulty' => $option, 'word' => $row['word']]);
    } else {
        $sql = "SELECT words.id, words.word, words.levelId FROM words INNER JOIN levels ON levels.id = words.levelId ORDER BY words.id";
        foreach ($conn->query($sql) as $row) {
            array_push($posts, (object)['id' => $row['id'], 'difficulty' => $row['levelId'], 'word' => $row['word']]);
        }
    }


// Create a new collection of posts, and specify relationships to be included.
$collection = (new Collection($posts, new WordSerializer()));

// Create a new JSON-API document with that collection as the data.
$document = new Document($collection);

// Output the document as JSON.
echo json_encode($document);