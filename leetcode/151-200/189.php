<?php
/**
 * 旋转数组 中等难度
 * 给定一个数组，将数组中的元素向右移动 k 个位置，其中 k 是非负数。

示例 1:
输入: [1,2,3,4,5,6,7] 和 k = 3
输出: [5,6,7,1,2,3,4]
解释:
向右旋转 1 步: [7,1,2,3,4,5,6]
向右旋转 2 步: [6,7,1,2,3,4,5]
向右旋转 3 步: [5,6,7,1,2,3,4]
示例 2:

输入: [-1,-100,3,99] 和 k = 2
输出: [3,99,-1,-100]
解释: 
向右旋转 1 步: [99,-1,-100,3]
向右旋转 2 步: [3,99,-1,-100]

 */

class Solution {

    /**
     * 环状替换
     * @param Integer[] $nums
     * @param Integer $k
     * @return NULL
     */
    function rotate(&$nums, $k) {
    	$length = count($nums);
        $k = $k % $length;
        $count = 0;
        for($start = 0; $count < $length; $start ++){
            $current = $start;
            $prev = $nums[$start];//1
            do{
                //获取当前坐标的下一个步伐坐标
                $next = ($current + $k) % $length;//3  6  1  4  7  3由到1了
                //获取下一个正确坐标的数存起来
                $temp = $nums[$next];//4  7  2   5   8 
                //把当前坐标数字移动到下一个正确坐标
                $nums[$next] = $prev; //1移动到4  4移动到7   7移动到2  2到5  5到8
                //把下一个坐标的值给当前
                $prev = $temp;//4给prev  7给prev  2给 prev   5给prev   8给prev
                //把下一个坐标给当前坐标
                $current = $next; //当前位置 3 当前位置6  1  4  7  
                $count++;// 1 2 3  4  5

            }while($start != $current);// 0 不等于 3 为真 进入第二次
        }
    }
}