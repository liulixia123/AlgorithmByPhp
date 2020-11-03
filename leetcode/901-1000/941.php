<?php
/**
 * 给定一个整数数组 A，如果它是有效的山脉数组就返回 true，否则返回 false。

让我们回顾一下，如果 A 满足下述条件，那么它是一个山脉数组：

A.length >= 3
在 0 < i < A.length - 1 条件下，存在 i 使得：
A[0] < A[1] < ... A[i-1] < A[i]
A[i] > A[i+1] > ... > A[A.length - 1]
 
示例 1：

输入：[2,1]
输出：false
示例 2：

输入：[3,5,5]
输出：false
示例 3：

输入：[0,3,2,1]
输出：true
 */
class Solution {

    /**
     * @param Integer[] $A
     * @return Boolean
     * 60ms
     */
    function validMountainArray($A) {
        $n = count($A);
        if($n<=2) return false;
        $j = 0;
        for ($i=0; $i < $n-2; $i++) { 
        	if($A[$i]<$A[$i+1]){
        		$j = $i+1;
        	}else{
        		break;
        	}
        }
        if($j==0) return false;
        for (; $j < $n-1; $j++) { 
        	if($A[$j]>$A[$j+1]){
        		
        	}else{
        		return false;
        	}
        }
        return true;
    }
    //双指针
    //左右两个指针往中间走，左边递增，右边递减，在中间相遇就是有效山脉
    //如果两个指针都在原处说明不是有效山脉
    //72ms
    function validMountainArray1($A){
    	$n = count($A);
    	if($n<3) return false;
    	$left = 0;
    	$right = $n-1;
    	while ($A[$left]<$A[$left+1]) {
    		$left++;
    	}
    	while ($A[$right]<$A[$right-1]) {
    		$right--;
    	}
    	if($right==$left&&$left!=0&&$right!=$n-1) return true;
    	return false;
    }
}