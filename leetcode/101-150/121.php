<?php
/**
 * 买卖股票最佳时机，进行一次交易
 * 动态规划求解
 * 状态定义
定义DP[i][0]为第i天不持股时的利润
定义DP[i][1]为第i天持股时的最大利润
状态方程
针对第 i 天所获得的最大利润，分为两种情况：
针对第 i 天所获得的最大利润，分为两种情况：

如果第 i 天不持有股票，可能第 i - 1 天时就已经不持股，也可能是在第 i 天时卖出了股票。
如果第 i 天仍然持有股票,可能第 i - 1 天还没有卖出股票，那么当前的最大利润应该是第 i - 1 天的最大利润。也可能是之前已经卖出了股票，而在第 i 天时重新购入股票。
dp[i][0] = MAX(dp[i - 1][0], dp[i - 1][1] + price[i]);
dp[i][1] = MAX(dp[i - 1][1]， 0 - price[i]);
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
	function maxProfit1($prices){
		$n = count($prices);
		if($n<=0) return 0;		
		$dp = [];
		$dp[0][0] = 0;
		$dp[0][1] = -$prices[0];
		for ($i=0; $i < $n; $i++) { 
			$dp[$i][0] = max($dp[$i-1][0],$dp[$i-1][1]+$prices[$i]);			
			$dp[$i][1] = max($dp[$i-1][1],0-$prices[$i]);
		}
		return $dp[$n-1][0];
	}
}
$s = new Solution();
echo "<pre>";
var_dump($s->maxProfit([7,6,4,3,1]));