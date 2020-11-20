<?php
//3个数最大乘积
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maximumProduct($nums) {
        rsort($nums);
        return max($nums[0] * $nums[1] * $nums[2], $nums[0] * $nums[count($nums)-1] * $nums[count($nums)-2]);

    }
}