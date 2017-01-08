<?php

namespace Atomescrochus\StringSimilarities;

class SmithWatermanMatchMismatch
{
    private $matchValue;
    private $mismatchValue;

    /**
     * Constructs a new match-mismatch substitution function. When two
     * characters are equal a score of <code>matchValue</code> is assigned. In
     * case of a mismatch a score of <code>mismatchValue</code>. The
     * <code>matchValue</code> must be strictly greater then
     * <code>mismatchValue</code>
     *
     * @param matchValue
     *            value when characters are equal
     * @param mismatchValue
     *            value when characters are not equal
     */
    public function __construct($matchValue, $mismatchValue)
    {
        if ($matchValue <= $mismatchValue) {
            throw new Exception("matchValue must be > matchValue");
        }

        $this->matchValue = $matchValue;
        $this->mismatchValue = $mismatchValue;
    }

    public function compare($a, $aIndex, $b, $bIndex)
    {
        return ($a[$aIndex] === $b[$bIndex] ? $this->matchValue
                : $this->mismatchValue);
    }

    public function max()
    {
        return $this->matchValue;
    }

    public function min()
    {
        return $this->mismatchValue;
    }
}
