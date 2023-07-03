<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums) {
        $k = 0;
        $cnt = 0;
        $cur_num_idx = 0;
        $next_num_idx = $cur_num_idx;
        while($cur_num_idx < count($nums)) {
            $next_num_idx = $cur_num_idx;
            while($next_num_idx < count($nums)
            && $nums[$next_num_idx] == $nums[$cur_num_idx]) {
                ++$next_num_idx;
                ++$cnt;
            }
            if($cnt > 1) {
                $nums[$k++] = $nums[$cur_num_idx];
                $nums[$k++] = $nums[$cur_num_idx];
            }
            else {
                $nums[$k++] = $nums[$cur_num_idx];
            }
            $cur_num_idx = $next_num_idx;
            $cnt = 0;
        }
        return $k;
    }
}