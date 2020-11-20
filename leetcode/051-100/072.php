<?php
/**
 * 编辑距离
 * 动态规划解决
 */
class Solution {
    public function minDistance($word1, $word2) {
    	$m = strlen($word1);
    	$n = strlen($word2);
    	$dp = [];
    	for ($i=0; $i <=$m; $i++) { 
    		$dp[0][$i] = $i;
    	}
    	for ($j=0; $j <=$n; $j++) { 
    		$dp[$j][0] = $j;
    	}
    	for($i=1;$i<=$m;$i++){
    		for ($j=1; $j <=$n; $j++) { 
    			if($word1[$i-1]==$word2[$j-1]){
    				$dp[$i][$j] = $dp[$i-1][$j-1];
    			}else{
    				$dp[$i][$j] = min($dp[$i-1][$j-1],$dp[$i-1][$j],$dp[$i][$j-1])+1;
    			}
    			
    		}
    	}
    	return $dp[$m][$n];
    }
}

$s = new Solution();
echo "<pre>";
var_dump($s->minDistance("intention","execution"));