<?php

namespace hangman;

interface WordDao
{
    public function getWord($diff);
    public function getWords();
}
