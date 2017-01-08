<?php

namespace Atomescrochus\StringSimilarities;

class SmithWatermanGotoh
{
    private $gapValue;
    private $substitution;

    /**
     * Constructs a new Smith Waterman metric.
     *
     * @param gapValue
     *            a non-positive gap penalty
     * @param substitution
     *            a substitution function
     */
    public function __construct(
        $gapValue = -0.5,
        $substitution = null
    ) {
    
        if ($gapValue > 0.0) {
            throw new Exception("gapValue must be <= 0");
        }
        //if(empty($substitution)) throw new Exception("substitution is required");
        if (empty($substitution)) {
            $this->substitution = new \Atomescrochus\StringSimilarities\SmithWatermanMatchMismatch(1.0, -2.0);
        } else {
            $this->substitution = $substitution;
        }
        $this->gapValue = $gapValue;
    }

    public function compare($a, $b)
    {
        if (empty($a) && empty($b)) {
            return 1.0;
        }

        if (empty($a) || empty($b)) {
            return 0.0;
        }

        $maxDistance = min(mb_strlen($a), mb_strlen($b))
                * max($this->substitution->max(), $this->gapValue);
        return $this->smithWatermanGotoh($a, $b) / $maxDistance;
    }

    private function smithWatermanGotoh($s, $t)
    {
        $v0 = [];
        $v1 = [];
        $t_len = mb_strlen($t);
        $max = $v0[0] = max(0, $this->gapValue, $this->substitution->compare($s, 0, $t, 0));

        for ($j = 1; $j < $t_len; $j++) {
            $v0[$j] = max(
                0,
                $v0[$j - 1] + $this->gapValue,
                $this->substitution->compare($s, 0, $t, $j)
            );

            $max = max($max, $v0[$j]);
        }

        // Find max
        for ($i = 1; $i < mb_strlen($s); $i++) {
            $v1[0] = max(0, $v0[0] + $this->gapValue, $this->substitution->compare($s, $i, $t, 0));

            $max = max($max, $v1[0]);

            for ($j = 1; $j < $t_len; $j++) {
                $v1[$j] = max(
                    0,
                    $v0[$j] + $this->gapValue,
                    $v1[$j - 1] + $this->gapValue,
                    $v0[$j - 1] + $this->substitution->compare($s, $i, $t, $j)
                );

                $max = max($max, $v1[$j]);
            }

            for ($j = 0; $j < $t_len; $j++) {
                $v0[$j] = $v1[$j];
            }
        }

        return $max;
    }
}
