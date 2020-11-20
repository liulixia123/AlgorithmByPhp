<?php
/**
 * 长度最小的子数组
 给定一个含有 n 个正整数的数组和一个正整数 s ，找出该数组中满足其和 ≥ s 的长度最小的子数组。如果不存在符合条件的子数组，返回 0。
 输入: [2,3,1,2,4,3], s = 7
输出: 2
解释: 子数组 [4,3] 是该条件下的长度最小的子数组。
解题双指针
 */
class Solution{
	function minSubArrayLen($s,$nums){
		$n = count($nums);
		if($n==0) return 0;
		$l = 0;
		$r = 0;
		$minlength = $n+1;
		$sum = 0;
		while($l<$n){
			if($r<$minlength&&$sum<$s){
				$sum+=$nums[$r];
				$r++;
			}else{
				$sum-=$nums[$l];
				//$sum = abs($sum);
				$l++;
			}

			if(abs($sum)>=$s){
				$minlength = min($minlength,abs($r-$l));
			}
			echo $sum."<br>";
		}
		if($minlength==$n+1) return 0;
		return $minlength;
	}
}
$s = new Solution();
echo "<pre>";
var_dump($s->minSubArrayLen(7,[2,3,1,2,4,3]));