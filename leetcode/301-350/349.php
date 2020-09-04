<?php
/**
 * 两个数组的交集
输入: nums1 = [1,2,2,1], nums2 = [2,2]
输出: [2]
输入: nums1 = [4,9,5], nums2 = [9,4,9,8,4]
输出: [9,4]
*/
class Solution{	
	public function intersection($nums1,$nums2){
		$len1 = count($nums1);
		$len2 = count($nums2);
		$resultset = $set = [];
		for ($i=0; $i < $len1; $i++) { 
			$set[$nums1[$i]] = $nums1[$i];
		}
		for ($j=0; $j < $len2; $j++) { 
			if($set[$nums2[$j]]){
				$resultset[$nums2[$j]] = $nums2[$j];
			}
		}
		return array_keys($resultset);
	}
}
$s = new Solution();
echo "<pre>";
var_dump($s->intersection([4,9,5],[9,4,9,8,4]));
