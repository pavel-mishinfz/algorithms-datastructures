<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $val
     * @return Integer
     */
    function removeElement(&$nums, $val) {
        $k = 0;
        $i = 0;
        while($i < count($nums)) {
            if($nums[$i] !== $val) {
                $nums[$k++] = $nums[$i]; 
            }
            ++$i;
        }
        return $k;
    }
}