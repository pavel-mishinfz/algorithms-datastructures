<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $i = 0;
        $arr = [];
        while($i < count($nums)) {
            $diff = $target - $nums[$i];
            if(array_key_exists($diff, $arr)) {
                return [$arr[$diff], $i];
            }
            $arr[$nums[$i]] = $i;
            ++$i;
        }
    }
}