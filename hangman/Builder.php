<?php
/**
 * Created by PhpStorm.
 * User: danielius
 * Date: 17.2.8
 * Time: 11.23
 */

namespace hangman;


interface Builder
{
    public function getCollection($entities);
}