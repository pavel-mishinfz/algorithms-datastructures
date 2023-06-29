<?php
class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isPalindrome($s) {
        $i = 0;
        $j = strlen($s) - 1;
        while($i < $j) {
            if(!ctype_alpha($s[$i]) && !is_numeric($s[$i])) {
                ++$i;
                continue;
            }
            elseif(!ctype_alpha($s[$j]) && !is_numeric($s[$j])) {
                --$j;
                continue;
            }
            elseif(strtolower($s[$i]) == strtolower($s[$j])) {
                ++$i;
                --$j;
                continue;
            }
            else {
                return false;
            }
        }
        return true;
    }
}