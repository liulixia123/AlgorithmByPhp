<?php
/**
 * 和为K的数组
 * 给定一个整数数组和一个整数 **k，**你需要找到该数组中和为 k 的连续的子数组的个数。

示例 1 :

输入:nums = [1,1,1], k = 2
输出: 2 , [1,1] 与 [1,1] 为两种不同的情况。
1
2
说明 :

数组的长度为 [1, 20,000]。
数组中元素的范围是 [-1000, 1000] ，且整数 k 的范围是 [-1e7, 1e7]。
 */
class Solution{
	//hash思想
	function subarraySum($nums,$k){
		$map = [];
		$map[0] = 1;
		$ans = 0;
		$sum = 0;
		$n = count($nums);
		for ($i=1; $i <= $n; $i++) { 
			$sum +=$nums[$i-1];
			$ans +=$map[$sum-$k];
			$map[$sum]++;
		}
		return $ans;
	}
}
$obj = new Solution();
$nums = [1,1,1];
$k = 2;
var_dump($obj->subarraySum($nums,$k));