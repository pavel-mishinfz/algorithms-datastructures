<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function nextPermutation(&$nums) {
        $i = count($nums) - 2;
        while($i >= 0 && $nums[$i] >= $nums[$i+1]) {
            --$i;
        }
        if($i >= 0) {
            $j = count($nums) - 1;
            while($j > 0 && $nums[$j] <= $nums[$i]) {
                --$j;
            }
            $tmp = $nums[$i];
            $nums[$i] = $nums[$j];
            $nums[$j] = $tmp;
        }
        $left = $i + 1;
        $right = count($nums) - 1;
        while($left < $right) {
            $tmp = $nums[$left];
            $nums[$left] = $nums[$right];
            $nums[$right] = $tmp;
            ++$left;
            --$right;
        }
    }
}