<?php
/**
 * 前 K 个高频元素
 * 给定一个非空的整数数组，返回其中出现频率前 k 高的元素。
输入: nums = [1,1,1,2,2,3], k = 2
输出: [1,2]
输入: nums = [1], k = 1
输出: [1]
你可以假设给定的 k 总是合理的，且 1 ≤ k ≤ 数组中不相同的元素的个数。
你的算法的时间复杂度必须优于 O(n log n) ， n 是数组的大小。

*/
class Solution{	
	public function reverseString($str){
		$i = 0;
		$j = strlen($str)-1;
		for ($i=0; $i < intval(strlen($str)/2); $i++) { 
			$temp = $str[$i];
			$str[$i] = $str[$j];
			$str[$j] = $temp;
			$j--;
		}
		return $str;

	}
}
$s = new Solution();
echo "<pre>";
print_r($s->reverseString('helloq'));
