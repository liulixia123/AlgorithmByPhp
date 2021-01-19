<?php
/**
 * 接雨水 困难
 * 输入：height = [0,1,0,2,1,0,1,3,2,1,2,1]
输出：6
解释：上面是由数组 [0,1,0,2,1,0,1,3,2,1,2,1] 表示的高度图，在这种情况下，可以接 6 个单位的雨水（蓝色部分表示雨水）。 
示例 2：

输入：height = [4,2,0,3,2,5]
输出：9
单调栈，递减，如果后一个元素比栈顶大，必然出现凹槽计算雨水量  凹槽长度和边界的高度差
 */
class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function trap($height) {
        $res = 0;
        $stack = [];
        $len = count($height);
        if($len<3){
        	return 0;
        }
        //array_push($stack,0);
        for ($i=0; $i < $len; $i++) { 
        	while ($stack&&$height[end($stack)]<$height[$i]) {
        		$temp = array_pop($stack);
        		if($stack){
        			$res +=(min($height[$i], $height[end($stack)])-$height[$temp])*($i - end($stack) - 1);
        		}
        	}        	     		
        	array_push($stack,$i);
        }
        return $res;
    }
}

$obj = new Solution();
echo $obj->trap([4,2,0,3,2,5]);