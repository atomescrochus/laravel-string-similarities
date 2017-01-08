<?php

namespace Atomescrochus\StringSimilarities;

class Levenshtein
{
    public function __construct()
    {
        // constructor body
    }

    /**
     * Run a basic levenshtein comparison using PHP's built-in function
     *
     * @param string $first First string to compare
     * @param string $second Second string to compare
     *
     * @return string Returns the phrase passed in
     */
    public function compare($first, $second)
    {
        return levenshtein($first, $second);
    }
}
