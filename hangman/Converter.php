<?php
/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.8
 * Time: 09.21
 */

namespace hangman;

interface Converter
{
    public function toCollection($entities);
}