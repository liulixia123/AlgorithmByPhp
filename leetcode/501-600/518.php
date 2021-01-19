<?php
/**
 * 零钱兑换II
 * 有多少中兑换方式
 */
Class Solution{
	function coinChange($coins,$amount){		
		$n = count($coins);
		if($n==0||$amount==0) return 0;		
		//$dp = array_fill(1, $amount+1, 0);
	  	$dp = [];
	  	$dp[0] = 1; //兑换0元有一种方式就是每种金币拿0个
		for ($i=0; $i<$n; $i++) { 
			for($j=1; $j<=$amount; $j++){
				if (($j - $coins[$i])>=0){
					$dp[$j] = $dp[$j]+$dp[$j - $coins[$i]];
				}
			}
		}
		return $dp[$amount];
	}
}

$s = new Solution();
var_dump($s->coinChange([1,2,5],5));