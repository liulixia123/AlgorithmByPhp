<?php
//转置矩阵
/*
给定一个矩阵 A， 返回 A 的转置矩阵。
矩阵的转置是指将矩阵的主对角线翻转，交换矩阵的行索引与列索引。 

示例 1：
输入：[[1,2,3],[4,5,6],[7,8,9]]
输出：[[1,4,7],[2,5,8],[3,6,9]]
示例 2：
输入：[[1,2,3],[4,5,6]]
输出：[[1,4],[2,5],[3,6]]
解题思路：简单
将列变成行遍历即可
*/
class Solution {

    /**
     * @param Integer[][] $A
     * @return Integer[][]
     */
    function transpose($A) {
        $arr = [];
        foreach ($A as $key => $val) {
            foreach ($val as $k2=>$v2) {
                $arr[$k2][$key] = $v2;
            }
        }
        return $arr; 
    }
}