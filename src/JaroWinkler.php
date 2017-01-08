<?php

namespace Atomescrochus\StringSimilarities;

class JaroWinkler
{
    public function compare($str1, $str2)
    {
        return $this->JaroWinkler($str1, $str2, $PREFIXSCALE = 0.1);
    }

    private function getCommonCharacters($string1, $string2, $allowedDistance)
    {

        $str1_len = mb_strlen($string1);
        $str2_len = mb_strlen($string2);
        $temp_string2 = $string2;

        $commonCharacters='';
        for ($i=0; $i < $str1_len; $i++) {
            $noMatch = true;
            // compare if char does match inside given allowedDistance
            // and if it does add it to commonCharacters
            for ($j= max(0, $i-$allowedDistance); $noMatch && $j < min($i + $allowedDistance + 1, $str2_len); $j++) {
                if ($temp_string2[$j] == $string1[$i]) {
                    $noMatch = false;
                    $commonCharacters .= $string1[$i];
                    // original code
                    // $temp_string2[$j] = '';
                    //
                    // following modified for >= 7.0, seems appropriate replacement, but no throws an
                    // Uninitialized string offset at line 25...
                    $temp_string2 = substr_replace($temp_string2, '', $j, 1);
                }
            }
        }
        return $commonCharacters;
    }

    private function Jaro($string1, $string2)
    {

        $str1_len = mb_strlen($string1);
        $str2_len = mb_strlen($string2);

      // theoretical distance
        $distance = (int) floor(min($str1_len, $str2_len) / 2.0);

      // get common characters
        $commons1 = $this->getCommonCharacters($string1, $string2, $distance);
        $commons2 = $this->getCommonCharacters($string2, $string1, $distance);

        if (($commons1_len = mb_strlen($commons1)) == 0) {
            return 0;
        }
        if (($commons2_len = mb_strlen($commons2)) == 0) {
            return 0;
        }
      // calculate transpositions
        $transpositions = 0;
        $upperBound = min($commons1_len, $commons2_len);
        for ($i = 0; $i < $upperBound; $i++) {
            if ($commons1[$i] != $commons2[$i]) {
                $transpositions++;
            }
        }
        $transpositions /= 2.0;
      // return the Jaro distance
        return ($commons1_len/($str1_len) + $commons2_len/($str2_len) + ($commons1_len - $transpositions)/($commons1_len)) / 3.0;
    }

    private function getPrefixLength($string1, $string2, $MINPREFIXLENGTH = 4)
    {

        $n = min(array( $MINPREFIXLENGTH, mb_strlen($string1), mb_strlen($string2) ));

        for ($i = 0; $i < $n; $i++) {
            if ($string1[$i] != $string2[$i]) {
                // return index of first occurrence of different characters
                return $i;
            }
        }
      // first n characters are the same
        return $n;
    }

    private function JaroWinkler($string1, $string2, $PREFIXSCALE = 0.1)
    {

        $JaroDistance = $this->Jaro($string1, $string2);
        $prefixLength = $this->getPrefixLength($string1, $string2);
        return $JaroDistance + $prefixLength * $PREFIXSCALE * (1.0 - $JaroDistance);
    }
}
