<?php
/**题目
Given an integer array nums , find the contiguous subarray (containing at least one number)
which has the largest sum and return its sum.
Input: [-2,1,-3,4,-1,2,1,-5,4],
Output: 6
Explanation: [4,-1,2,1] has the largest sum = 6.
意思就是给定一个整数数组 nums ，找到一个具有最大和的连续子数组（子数组最少包含一个元素），返回其最
大和。
解题思路

*/

class Solution{
	public function maxSubArray($nums){
		$length = count($nums);
		if($length == 0) return 0;
		if($length == 1) return $nums[0];
		$maxsum = $sum= $nums[0];
		for ($i=1; $i < $length; $i++) { 
			if($sum>=0){
				$sum+=$nums[$i];
			}else{
				$sum = $nums[$i];
			}
			if($maxsum<$sum) $maxsum=$sum;
		}
		return $maxsum;
	}
}
$s = new Solution();
print_r($s->maxSubArray([-2,1,-3,4,-1,2,1,-5,4]));