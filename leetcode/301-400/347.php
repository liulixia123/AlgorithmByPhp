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
	public function topKFrequent($nums,$k){
		if(empty($nums)) return [];
		$temp = array_count_values($nums);
		$i = 1;
		$res = [];
		foreach ($temp as $key => $value) {
			if($i<=$k){
				array_push($res,$key);
			}else{
				break;
			}
			++$i;
		}
		return $res;
	}
}
$s = new Solution();
echo "<pre>";
$nums = [1,1,1,2,2,3];
$k =2;
print_r($s->topKFrequent($nums,$k));
