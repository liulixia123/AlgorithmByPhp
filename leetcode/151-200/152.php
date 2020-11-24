<?php
/**
 * 乘积最大子数组
 * 给定一个整数数组 nums ，找出一个序列中乘积最大的连续子序列（该序列至少包含一个数）。

示例 1:
输入: [2,3,-2,4]
输出: 6
解释: 子数组 [2,3] 有最大乘积 6。

示例 2:
输入: [-2,0,-1]
输出: 0
解释: 结果不能为 2, 因为 [-2,-1] 不是子数组。
动态规划求解
dp[i][0] 求乘积最小
dp[i][1] 求乘积最大
因为有可能是负数，负负得正
 */
class Solution{
	function maxProduct($nums){
		if(empty($nums)) return 0;
		$dp = [];
		$n = count($nums);
		$dp[0][0] = $nums[0];
		$dp[0][1] = $nums[0];
		$max = 0;
		for ($i=1; $i < $n; $i++) { 
			$dp[$i][0] = min($dp[$i-1][0]*$nums[$i],$nums[$i],$dp[$i-1][1]*$nums[$i]);
			$dp[$i][1] = max($dp[$i-1][0]*$nums[$i],$nums[$i],$dp[$i-1][1]*$nums[$i]);
			$max = max($max,$dp[$i][1]);
		}
		return $max;
	}
}
$s = new Solution();
$nums = [2,3,-2,4];
var_dump($s->maxProduct($nums));