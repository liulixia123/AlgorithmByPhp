<?php
/**题目
盛最多水容器
给你 n 个非负整数 a1，a2，...，an，每个数代表坐标中的一个点 (i, ai) 。在坐标内画 n 条垂直线，垂直线 i 的两个端点分别为 (i, ai) 和 (i, 0)。找出其中的两条线，使得它们与 x 轴共同构成的容器可以容纳最多的水。

说明：你不能倾斜容器，且 n 的值至少为 2。
示例
输入：[1,8,6,2,5,4,8,3,7]
输出：49
解题思路双指针

*/

class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    public function maxArea($height) {
        $size = count($height);
        // 必须要两个线段以上
        if($size < 2 ) return 0;
        $max  = 0;
        $left = 0;
        $right= $size-1;
        while($left < $right) {
            $max = max($max, min($height[$left],$height[$right]) * ($right-$left));
            if($height[$left] < $height[$right]) {
                $left++;
            }else{
                $right--;
            }
        }
        return $max;
    }
}
$s = new Solution();
var_dump($s->maxArea([2,3,4,5,18,17,6]));