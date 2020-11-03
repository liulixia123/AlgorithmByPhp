<?php
/**
 * 买卖股票最佳时机,进行两次交易
 * 动态规划求解
 */
class Solution{
	private static $MAX_DEAL_TIMES = 2;//最大买卖次数
	function maxProfit($prices){
		$n = count($prices);//表格中最大行数
		if($n<=0) return 0;
		//$m = self::MAX_DEAL_TIMES*2+1;//表格中最大列数
		$m = 5;
		$dp = [];
		//$dp[0] = array_fill(0, $n, 0);
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
		return $dp[$n-1][$m-1];
	}
	function maxProfit1($prices){
		$n = count($prices);//表格中最大行数
		if($n<=0) return 0;
		//$m = self::MAX_DEAL_TIMES*2+1;//表格中最大列数
		$m = 5;
		$dp = [];
		//$dp[0] = array_fill(0, $n, 0);
		$dp[1] = -$prices[0];
		$dp[3] = -$prices[0];
		for ($i=1; $i < $n; $i++) { 
			for ($j=1; $j < $m; $j++) { 
				if(($j&1)==1){					
					$dp[$j] = max($dp[$j],$dp[$j-1]-$prices[$i]);
				}else{
					$dp[$j] = max($dp[$j],$dp[$j-1]+$prices[$i]);
				}
			}
		}		
		return $dp[$m-1];
	}
}
$s = new Solution();
echo "<pre>";
var_dump($s->maxProfit1([1,2,4,8,3,9,6,7]));