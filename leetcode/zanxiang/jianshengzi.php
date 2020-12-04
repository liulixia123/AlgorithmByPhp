<?php
/**
 * 剪绳子
 */

function maxLen($n){
	$dp = [];//长度为i时最长乘积
	$dp[0] = 0;
	$dp[1] = 1;
	$dp[2] = 2;
	$dp[3] = 3;
	$maxlen = 0;
	if($n<2){
		return 0;
	}elseif($n==2){
		return 1;
	}elseif($n==3){
		return 2;
	}else{
		for ($i=4; $i <= $n; $i++) { 
			for ($j=1; $j <= intval($i/2); $j++) { 
				$temp = $dp[$j]*$dp[$i-$j];
				$maxlen = max($maxlen,$temp);
			}
			$dp[$i] = $maxlen;
		}
	}
	return $dp[$n];
}

echo maxlen(8);