<?php
/**
 * 最长连续序列
 * [100,4,200,1,2,3]
 * 输出 4 
 * 最长连续序列 1 2 3 4
 * [0,-1]
 * 输出2
 * 解题思路hash
 * 
 */
class Solution{
	function longestConsecutive($nums){
		$longest = 0;
		$numsset = array_flip($nums);
		//$currentNum = $nums[0];
		foreach ($numsset as $key => $value) {
			if(!array_key_exists($nums[$value]-1, $numsset)){//我们只对当前数字 - 1 不在哈希表里的数字，作为连续序列的第一个数字去找对应的最长序列
				$currentNum = $nums[$value];
				$currentStreak = 1;
				while(array_key_exists($currentNum+1,$numsset)){					
					$currentNum += 1;
					$currentStreak +=1;
				}				
				$longest = max($longest,$currentStreak);
			}
		}
		return $longest;
	}

}
$s = new Solution();
var_dump($s->longestConsecutive([100,4,200,1,2,3]));