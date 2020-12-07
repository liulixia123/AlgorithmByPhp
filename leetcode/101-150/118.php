<?php
/**
 * 杨辉三角
 * 动态规划求解
 */
class Solution{
	function yanhui($n){
		if($n<=0) return [];
		$dp = [];
		$dp[0] = [1];
		$dp[1] = [1,1];
		for ($i = 2; $i <= $n; $i++) { 
			for ($j=0; $j <= $i ; $j++) { 
				$dp[$i][$j] = $dp[$i-1][$j-1]+ $dp[$i-1][$j];
			}			
		}
		return $dp;
	}
}
$obj = new Solution();
echo "<pre>";
print_r($obj->yanhui(4));