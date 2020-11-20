<?php
/**
 * 三角形最小路径和
 * 动态规划求解
 * [
     [2],
    [3,4],
   [6,5,7],
  [4,1,8,3]
]
自顶向下的最小路径和为 11（即，2 + 3 + 5 + 1 = 11）。
 */

class Solution {
    function minimumTotal($triangle){
    	if(empty($triangle)) return 0;
    	$dp = $triangle;
    	$n = count($triangle);
    	if($n==1) return $triangle[0];
    	//$dp[0][0] = $triangle[0][0];
    	for ($i=$n-2; $i>=0; $i--) { 
    		for($j=0;$j<=count($triangle[$i])-1;$j++){
    			$dp[$i][$j] = min($dp[$i+1][$j],$dp[$i+1][$j+1])+$triangle[$i][$j];
    		}
    		
    	}     	  	
    	return $dp[0][0];
    }
}

$s = new Solution();
$triangle = [
     [2],
    [3,4],
   [6,5,7],
  [4,1,8,3]
];
var_dump($s->minimumTotal($triangle));