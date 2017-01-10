<?php

namespace Atomescrochus\StringSimilarities;

use Atomescrochus\StringSimilarities\SmithWatermanGotoh;

class Compare
{

    /**
     * Run a basic levenshtein comparison using PHP's built-in function
     *
     * @param string $first First string to compare
     * @param string $second Second string to compare
     *
     * @return string Returns the phrase passed in
     */
    public function levenshtein($first, $second)
    {
        $l = new \Atomescrochus\StringSimilarities\Levenshtein();

        return $l->compare($first, $second);
    }

    public function jaroWinkler($first, $second)
    {
        $jw = new \Atomescrochus\StringSimilarities\JaroWinkler();

        return $jw->compare($first, $second);
    }

    public function smg($first, $second)
    {
        $o = new \Atomescrochus\StringSimilarities\SmithWatermanGotoh();
        return $o->compare($first, $second);
    }
}
