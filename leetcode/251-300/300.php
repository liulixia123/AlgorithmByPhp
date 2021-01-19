<?php
//最长上升子序列
class Solution{
	/**
	 * 动态规划N^2
	 * @param  [type] $nums [description]
	 * @return [type]       [description]
	 */
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
	/**
	 * N*logN解法
	 */
	function lengthOfLIS1($nums){
		$n = count($nums);
		if($n==0) return 0;
		if($n==1) return 1;
		$dp = [];
		$ends[0] = $nums[0];
		$dp[0] =1;
		$l = 0;
		$r = 0;
		$mid = 0;
		$right= 0;//0-right 有效，right往后无效
		for ($i=1; $i < $n; $i++) {
			$l = 0;
			$r = $right;
			//二分查找最左小的数			
			while($l<=$r) 
			{
				$mid=($l+$r)>>1;				
				if($ends[$mid]<$nums[$i]) {
					$l = $mid+1;
				}else{
					$r = $mid-1;
				}
				
			}
			$right = max($right,$l);			
			$ends[$l] = $nums[$i];
			$dp[$i] = $l+1;
		}
		return $dp[$n-1];
	}
}
$obj = new Solution();
echo "<pre>";
$nums = [10,9,2,5,3,7,101,18];
print_r($obj->lengthOfLIS1($nums));