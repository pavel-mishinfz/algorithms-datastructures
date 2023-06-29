<?php
class Solution {

    /**
     * @param String[] $s
     * @return NULL
     */
    function reverseString(&$s) {
        $left = 0;
        $right = count($s) - 1;
        while($left < $right) {
            $tmp = $s[$left];
            $s[$left] = $s[$right];
            $s[$right] = $tmp;
            ++$left;
            --$right;
        }
    }
}

/****** Approach ******/
/**
 *  The approach is to use two pointers. One pointer is set to the beginning of the line and the other to the end of the line. While the left pointer is smaller than the right pointer, we continue to rearrange the elements.
 *
 * 
 */