<?php
/**
 * 数组中第K个大元素
 */
class Solution{
	//hash思想
	function findKthLargest($nums,$k){
		if(empty($nums)) return 0;
		$len = count($nums);
		$max = $nums[0];
		$min = $nums[0];
		for ($i=0; $i < $len; $i++) { 
			if($nums[$i]>$max) $max = $nums[$i];
			if($nums[$i]<$min) $min = $nums[$i];
		}
		foreach ($nums as $key => $value) {
			$arr[$max-$value]++;
		}
		$sum = 0;
		for ($i=0; $i < count($arr); $i++) { 
			$sum +=$arr[$i];
			if($sum>=$k) return $max-$i;
		}
		return 0;
	}
}
$s = new Solution();
echo "<pre>";
var_dump($s->findKthLargest([3,2,1,5,6,4],2));