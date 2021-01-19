<?php
/**题目
最大子序和 最大累加和
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
	/**
	 * 动态规划求解
	 * $dp[$i] 表示第i个元素上最大子序和，
	 * dp[i-1]表示的是以i-1为结尾的最大子序和，
	 * 若dp[i-1]小于0，则dp[i]加上前面的任意长度的序列和都会小于不加前面的序列
	 * @param  [type] $nums [description]
	 * @return [type]       [description]
	 */
	function maxSubArray1($nums){
		$length = count($nums);
		if($length == 0) return 0;
		if($length == 1) return $nums[0];
		$maxsum = $nums[0];
		$dp = [];
		for ($i=1; $i < $length; $i++) { 
			if($dp[$i-1]>0){
				$dp[$i] = $dp[$i-1]+$nums[$i];
			}else{
				$dp[$i] = $nums[$i];
			}
			$maxsum = max($maxsum,$dp[$i]);
		}
		return $maxsum;
	}
}
$s = new Solution();
print_r($s->maxSubArray1([-2,1,-3,4,-1,2,1,-5,4]));