<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function sortColors(&$nums) {
        $l = 0;
        $m = 0;
        $h = count($nums) - 1;
        while($m <= $h) {
            if($nums[$m] == 0) {
                $tmp = $nums[$l];
                $nums[$l] = $nums[$m];
                $nums[$m] = $tmp;
                ++$l;
                ++$m;
            }
            elseif($nums[$m] == 1) {
                ++$m;
            }
            else {
                $tmp = $nums[$h];
                $nums[$h] = $nums[$m];
                $nums[$m] = $tmp;
                --$h;
            }
        }
    }
}

/****** Approach ******/
/**
 *  Dutch National Flag algorithm:
 *  1. It is necessary to set three pointers: low - indicates the beginning of the array; medium - indicates the beginning of the array; high - indicates the end of the array.
 * 
 *  2. The algorithm moves the middle pointer through the array, comparing the value at each position with 0, 1 or 2. If the value is 0, then the middle and low pointers change values and then increase by one. If the value is 1, then the average pointer is incremented by one. If the value is 2, then the middle and high pointers exchange values and the high pointer is reduced by one.
 * 
 *  3. The array will be sorted when the middle pointer is aligned with the high pointer
 */