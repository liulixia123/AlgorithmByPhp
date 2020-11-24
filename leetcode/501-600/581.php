<?php
/**
 * 最短无序连续子数组
 * 给定一个整数数组，你需要寻找一个连续的子数组，如果对这个子数组进行升序排序，那么整个数组都会变为升序排序。

你找到的子数组应是最短的，请输出它的长度。
输入: [2, 6, 4, 8, 10, 9, 15]
输出: 5
解释: 你只需要对 [6, 4, 8, 10, 9] 进行升序排序，那么整个表都会变为升序排序。
说明 :

输入的数组长度范围在 [1, 10,000]。
输入的数组可能包含重复元素 ，所以升序的意思是<=。
双指针
遍历数组，从左找小于数组中最大元素max的元素，记录最后一个小于最大元素的下标high；同理从右找大于数组中最小元素min的元素，记录最后一个大于最大元素的下标low。如果low >= high, 说明数组本身有序，否则high - low + 1就是无序号长度。

算法：
1. 初始设定数组中最大值为第一个元素，最小值为最后一个元素，即$max = $nums[0]; $min = nums[count(nums[count(nums) - 1];
2. 设定无序子数组的起始下标为low，log = count($nums) - 1, 截止下标为high, high = 0。
3. 从第二个元素开始遍历数组。
4. 从左往右，如果当前元素大于max, 就更新max为当前元素，然后检查当前元素，如果比max小, 就把当前元素下标赋值给high;
5. 从右往左，如果当前元素小于min, 就更新min为当前元素，然后检查当前元素，如果比min大，就把当前元素下标赋值给low;
6. 如果high <= low, 说明数组本身有序，返回0.
7. 如果high > low, 两个下标直接的元素个数就是子数组长度，即high - low + 1

 */
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findUnsortedSubarray($nums) {
        $len = count($nums);
        if ($len <= 0) return 0; 
        
        $max = $nums[0];
        $min = $nums[$len - 1];

        $high = 0;
        $low = $len - 1;

        for ($i = 1; $i < $len; $i++) {
            if ($nums[$i] > $max) $max = $nums[$i];
            if ($nums[$len - 1 - $i] < $min) $min = $nums[$len - 1 - $i];

            if ($nums[$i] < $max) $high = $i;
            if ($nums[$len - 1 - $i] > $min) $low = $len - 1 - $i;
        }

        return $high > $low ? $high - $low + 1 : 0;

    }
}
$s = new Solution();
echo "<pre>";
print_r($s->findUnsortedSubarray([2, 6, 4, 8, 10, 9, 15]));