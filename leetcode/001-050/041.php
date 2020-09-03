<?php
/**题目
Given an unsorted integer array, find the smallest missing positive integer.
Example 1:
Input: [1,2,0]
Output: 3 
Example 2:
Input: [3,4,-1,1]
Output: 2 
Example 3:
Input: [7,8,9,11,12]
Output: 1 
Note:
Your algorithm should run in O(n) time and uses constant extra space.
你的算法的时间复杂度应为O(n)，并且只能使用常数级别的空间

意思就是找到缺失的第一个正整数。
解题思路为了减少时间复杂度，可以把 input 数组都装到 map 中，然后 i 循环从 1 开始，依次⽐对 map 中是否
存在 i，只要不存在 i 就立即返回结果，即所求。
这道题使用桶排序的思路,即 “一个萝卜一个坑”，就可以解决

*/

class Solution{
	//关键字：桶排序，什么数字就要放在对应的索引上，其它空着就空着
	public function firstMissingPositive($nums){
		$length = count($nums);
	    if($length==0) return 1;
	    for ($i=0; $i < $length; $i++) { 
	    	// 前两个是在判断是否成为索引
            // 后一个是在判断，例如 3 在不在索引 2 上
            // 即 nums[i] ?= nums[nums[i]-1] 这里要特别小心
	    	if($nums[$i]>0&&$nums[$i]<$length&&$nums[$nums[$i]-1]!=$nums[$i]){
	    		$this->swap($nums,$nums[$i]-1,$i);
	    	}
	    }
	    for ($i=0; $i < $length; $i++) { 
	    	if($nums[$i]-1!=$i){
	    		return $i+1;
	    	}
	    }
	    return $length+1;
	}
	private function swap(&$nums,$index1,$index2){
		$temp = $nums[$index1];
		$nums[$index1] = $nums[$index2];
		$nums[$index2] = $temp;
	}
}
$s = new Solution();
print_r($s->firstMissingPositive([1,3,0]));