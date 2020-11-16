<?php
/**
 * 最长连续序列
 * [100,4,200,1,2,3]
 * 输出 4 
 * 最长连续序列 1 2 3 4
 * 解题思路hash
 * 
 */
class Solution{
	function longestConsecutive($nums){
		$longest = 0;
		$numsset = array_flip($nums);
		foreach ($numsset as $key => $value) {
			if(!$numsset[$nums[$value]-1]){
				$currentNum = $nums[$value];
				$currentStreak = 1;
			}
			while($numsset[$currentNum+1]){
				$currentNum += 1;
				$currentStreak +=1;
			}
			$longest = max($longest,$currentStreak);
		}
		return $longest;
	}

}
$s = new Solution();
var_dump($s->longestConsecutive([100,4,200,1,2,3,5]));