<?php
/**题目
Given a sorted array nums, remove the duplicates in-place such that each element appear only
once and return the new length.
Do not allocate extra space for another array, you must do this by modifying the input array inplace
with O(1) extra memory.
Example 1:
Given nums = [1,1,2],
Your function should return length = 2, with the first two elements of nums
being 1 and 2 respectively.
It doesn't matter what you leave beyond the returned length.
Example 2:
Given nums = [0,0,1,1,1,2,2,3,3,4],
Your function should return length = 5, with the first five elements of nums
being modified to 0, 1, 2, 3, and 4 respectively.
It doesn't matter what values are set beyond the returned length.
意思就是给定⼀个有序数组 nums，对数组中的元素进⾏去重，使得原数组中的每个元素只有一个。最后返回去
重以后数组的长度值。
解题思路这道题和第 27 题很像。这道题和第 283 题，第 27 题基本⼀致，283 题是删除 0，27 题是删除指定元
素，这⼀题是删除重复元素，实质是⼀样的。
这⾥数组的删除并不是真的删除，只是将删除的元素移动到数组后面的空间内，然后返回数组实际剩余
的元素个数，OJ 最终判断题目的时候会读取数组剩余个数的元素进行输出。
*/

class Solution{
	public function removeDuplicates($nums){
		$length = count($nums);
		if($length<=0) return 0;
		$count = 0;
		for ($i=0; $i < $length-1; $i++) { 
			if($nums[$i]^$nums[$i+1]) {
				$count++;//两个元素不相同异或结果是1，相同异或结果是0
				$nums[$count]=$nums[$i];
			}
		}
		return $count+1;
	}
}
$s = new Solution();
print_r($s->removeDuplicates([0,0,1,1,1,2,2,3,3,4]));