<?php
//有序数组的平方
/*
给定一个按非递减顺序排序的整数数组 A，返回每个数字的平方组成的新数组，要求也按非递减顺序排序。

示例 1：

输入：[-4,-1,0,3,10]
输出：[0,1,9,16,100]
示例 2：

输入：[-7,-3,2,3,11]
输出：[4,9,9,49,121]

 */
class Solution {

    /**
     * @param Integer[] $A
     * @return Integer[]
     */
    function sortedSquares($A) {
        $len = count($A);
        if($len<=0) return [];
        $left = 0;
        $right = $len-1;
        $res = [];
        while($left<=$right){
        	if($A[$left]*$A[$left]>$A[$right]*$A[$right]){
        		array_unshift($res,$A[$left]*$A[$left]);
        		$left++;
        		
        	}else{
        		array_unshift($res,$A[$right]*$A[$right]);
        		$right--;
        		
        	}
        }
        return $res;
    }
    function sortedSquares($A) {
    	$len = count($A);
        if($len<=0) return []; 
        foreach($A as $v){
        	$res[] = pow($v,2);
        }
        sort($res);
        return $res;	
    }
}

$s = new Solution();
echo "<pre>";
print_r($s->sortedSquares([-4,-1,0,3,10]));