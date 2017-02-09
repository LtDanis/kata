<?php

namespace hangman;

interface WordDao
{
    public function getWord($diff, $option);
    public function getWords();
}
