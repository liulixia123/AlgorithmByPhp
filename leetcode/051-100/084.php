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
		return $max;
	}
}
$s = new Solution();
var_dump($s->maxArea([6,7,5,2,4,5,9,3]));