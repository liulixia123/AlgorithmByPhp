<?php
/**题目
Given an array of integers, return indices of the two numbers such that they add up to a specific target.
You may assume that each input would have exactly one solution.
Given nums = [2, 7, 11, 15], target = 9,
Because nums[0] + nums[1] = 2 + 7 = 9,
return [0, 1].
意思就是在数组中找到 2 个数之和等于给定值的数字，结果返回 2 个数字在数组中的下标。
解题思路
双指针

*/

class Solution{
	public function twoSum($nums,$target){
		$l = 0;
		$r = count($nums)-1;
		while ($l < $r) {
			if($nums[$l]+$nums[$r]==$target){
				return [$l+1,$r+1];
			}elseif($nums[$l]+$nums[$r]>$target){
				$r--;
			}else{
				$l++;
			}
		}
	}
}
$s = new Solution();
print_r($s->twoSum([1,2, 7, 11, 15], 9));