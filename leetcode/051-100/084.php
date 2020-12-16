<?php
/**
 * 柱形最大面积
 *
 * 最优解是用栈解
 */
class Solution{
	function maxArea($nums){
		$n = count($nums);
		$stack = [];
		array_push($stack,-1);
		$max = 0;
		for ($i=0; $i < $n; $i++) { 
			while($nums[$i]<$nums[end($stack)]){
				$k = array_pop($stack);
				$max = max($max,$nums[$k]*($i-end($stack)-1));
			}
			
			array_push($stack,$i);
		}
		// 栈不为空时还需继续计算
		while (!empty($stack)) {
			// 栈顶高度
			$height = $nums[array_pop($stack)];
			//左边第一个小于当前高度的下标
			$left = end($stack);
			//右边大于当前高度的下标，等于数组的长度
			$right = $n;
			$max = max($max,$height*($right-$left-1));
		}
		
		return $max;
	}
}
$s = new Solution();
var_dump($s->maxArea([3,1,3,2,2]));