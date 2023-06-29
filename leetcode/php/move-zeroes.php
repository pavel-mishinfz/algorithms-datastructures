<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function moveZeroes(&$nums) {
        $len = count($nums);
        if($len == 1) {
            return;
        }
        $cnt_zero = 0;
        for($i = 0; $i < $len; ++$i) {
            if($nums[$i] == 0) {
                ++$cnt_zero;
            }
            elseif($cnt_zero > 0) {
                $tmp = $nums[$i];
                $nums[$i] = $nums[$i - $cnt_zero];
                $nums[$i - $cnt_zero] = $tmp;
            }
        }
    }
}

/****** Approach ******/
/**
 *  Imagine that the zeros stick to each other and we don't need to move each zero separately. Then we can only change the first zero of the chain of zeros to the next number, and all the other zeros will already be on the left. 
 * 
 *  | |              |   |            |   |
 *  ▼ ▼              ▼   ▼            ▼   ▼
 *  0 1 0 2 3 0 -> 1 0 0 2 3 0 -> 1 2 0 0 3 0 -> 1 2 3 0 0 0
 * 
 */