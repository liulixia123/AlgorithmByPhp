<?php
/*
找到所有数组中消失的数字
给定一个范围在  1 ≤ a[i] ≤ n ( n = 数组大小 ) 的 整型数组，数组中的元素一些出现了两次，另一些只出现一次。

找到所有在 [1, n] 范围之间没有出现在数组中的数字。

您能在不使用额外空间且时间复杂度为O(n)的情况下完成这个任务吗? 你可以假定返回的数组不算在额外空间内。
输入:
[4,3,2,7,8,2,3,1]

输出:
[5,6]
2次遍历数组，第一次遍历把访问过的元素做一个标记(把数字映射到下标，加一个负号)，因为是按照有序下标访问的，故而第二次遍历的时候如果数不为负，说明该数对应的下标没被访问，下标即消失的数字。

 */
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function findDisappearedNumbers($nums) {
        $res = [];
        for ($i = 0; $i < count($nums); $i++) {
            $nums[abs($nums[$i]) - 1] = -abs($nums[abs($nums[$i]) - 1]);
        }        
        for ($i = 0; $i < count($nums); $i++) {
            if ($nums[$i] > 0) $res[] = $i + 1;
        }       
        return $res;
    }
}
$s = new Solution();
echo "<pre>";
var_dump($s->findDisappearedNumbers([4,3,2,7,8,2,3,1]));