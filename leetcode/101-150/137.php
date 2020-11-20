<?php
/**
 * 只出现一次的数字II
 是136题的加强版
 给定一个数组，数组中只有一个元素出现一次，其他元素出现3次，你能在线性时间复杂度求解吗
 */
class Solution{
	public function singleNumber($nums){
		$len = count($nums);
		$x1 = $x2 = 0;
		$mask = 0;
		for ($i=0; $i < $len; $i++) { 
			$x2 ^=$x1&$nums[$i];
			$x1 ^=$nums[$i];
			$mask = ~($x1&$x2);
			$x2 &= $mask;
			$x1 &= $mask; 
		}
		
		return $x1;
	}
}
$s = new Solution();
echo "<pre>";
print_r($s->singleNumber([9,1,9,2,1,9,1]));