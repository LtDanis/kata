<?php
use Tobscure\JsonApi\Exception\Handler\ExceptionHandlerInterface;

class HangmanException implements ExceptionHandlerInterface {

    public function manages(Exception $e)
    {
        return true;
    }


    public function handle(Exception $e)
    {
        return $error = ['status' => "asfas", 'title' => 'Internal server '];
    }
}
