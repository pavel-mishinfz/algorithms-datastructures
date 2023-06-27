<?php
class Solution {

    /**
     * @param Integer $n
     * @param Integer $k
     * @return String
     */
    function getPermutation($n, $k) {
        $nums = range(1,$n);
        $this->nextPermutation($nums, $k);
        return implode($nums);
    }

    function nextPermutation(&$nums, $k) {
        if($k == 1) {
            return;
        }
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
        $this->nextPermutation($nums, --$k);
    }
}