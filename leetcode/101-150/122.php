<?php
/**
 * 买卖股票最佳时机,进行两次交易
 * 动态规划求解
 * 状态定义
定义DP[i][0]为第i天不持股时的利润
定义DP[i][1]为第i天持股时的最大利润
状态方程
针对第 i 天所获得的最大利润，分为两种情况：

如果第 i 天不持有股票，可能第 i - 1 天时就已经不持股，也可能是在第 i 天时卖出了股票，并收取手续费。
如果第 i 天仍然持有股票,可能第 i - 1 天还没有卖出股票，那么当前的最大利润应该是第 i - 1 天的最大利润。也可能是在第 i - 1 天时卖出了股票，而在第 i 天时重新购入股票。
 */
class Solution{
	private static $MAX_DEAL_TIMES = 2;//最大买卖次数
	function maxProfit($prices){
		$n = count($prices);//表格中最大行数
		if($n<=0) return 0;
		//$m = self::MAX_DEAL_TIMES*2+1;//表格中最大列数
		$m = 5;
		$dp = [];
		$dp[0][0] = $dp[0][2] = $dp[0][4] = $dp[1][0] = $dp[2][0] = $dp[3][0]= $dp[4][0]= $dp[5][0]=$dp[6][0]=$dp[7][0]=0;
		$dp[0][1] = -$prices[0];
		$dp[0][3] = -$prices[0];
		
		for ($i=1; $i < $n; $i++) { 
			for ($j=1; $j < $m; $j++) { 
				if(($j&1)==1){					
					$dp[$i][$j] = max($dp[$i-1][$j],$dp[$i-1][$j-1]-$prices[$i]);
				}else{
					$dp[$i][$j] = max($dp[$i-1][$j],$dp[$i-1][$j-1]+$prices[$i]);
				}
			}
		}
		print_r($dp);		
		return $dp[$n-1][$m-1];
	}
	function maxProfit1($prices){
		$n = count($prices);//表格中最大行数
		if($n<=0) return 0;		
		$dp = [];
		$dp[0][0] = 0;
		$dp[0][1] = -$prices[0];
		for ($i=1; $i < $n; $i++) { 
			$dp[$i][0] = max($dp[$i-1][0],$dp[$i-1][1]+$prices[$i]); 
			$dp[$i][1] = max($dp[$i-1][1],$dp[$i-1][0]-$prices[$i]); 
		}
		return $dp[$n-1][0];
	}
}
$s = new Solution();
echo "<pre>";
var_dump($s->maxProfit1([7,1,5,3,6,4]));