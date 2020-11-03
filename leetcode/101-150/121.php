<?php
/**
 * 买卖股票最佳时机，进行一次交易
 * 动态规划求解
 */
class Solution{
	function maxProfit($prices){
		$n = count($prices);
		if($n<=0) return 0;
		$min = PHP_INT_MAX;
		$dp = [];
		$dp[0] = 0;
		for ($i=0; $i < $n; $i++) { 
			if($prices[$i]<$min) $min = $prices[$i];
			$dp[$i] = max(($prices[$i]-$min),$dp[$i-1]);
		}
		return $dp[$n-1];
	}
}
$s = new Solution();
echo "<pre>";
var_dump($s->maxProfit([7,6,4,3,1]));