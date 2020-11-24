<?php
//最长上升子序列
class Solution{
	function lengthOfLIS($nums){
		$n = count($nums);
		if($n==0) return 0;
		if($n==1) return $nums;
		$dp = array_fill(0,$n,1);
		for($i=0;$i<$n;$i++){
			for ($j=0; $j < $i; $j++) { 
				if($nums[$i]>$nums[$j]){
					$dp[$i] = max($dp[$i],$dp[$j]+1);
				}
				
			}
		}
		return $dp[$n-1];
	}
}
$obj = new Solution();
echo "<pre>";
$nums = [10,9,2,5,3,7,101,18];

print_r($obj->lengthOfLIS($nums));