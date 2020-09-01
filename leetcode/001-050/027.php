<?php
/**题目
Given an array nums and a value val, remove all instances of that value in-place and return the
new length.
Do not allocate extra space for another array, you must do this by modifying the input array inplace
with O(1) extra memory.
The order of elements can be changed. It doesn't matter what you leave beyond the new length.
Example 1:
Given nums = [3,2,2,3], val = 3,
Your function should return length = 2, with the first two elements of nums
being 2.
It doesn't matter what you leave beyond the returned length.
Example 2:
Given nums = [0,1,2,2,3,0,4,2], val = 2,
Your function should return length = 5, with the first five elements of nums
containing 0, 1, 3, 0, and 4.
Note that the order of those five elements can be arbitrary.
It doesn't matter what values are set beyond the returned length.
意思就是给定一个数组 nums 和一个数值 val，将数组中所有等于 val 的元素删除，并返回剩余的元素个数。
解题思路
这道题和第 283 题很像。这道题和第 283 题基本⼀致，283 题是删除 0，这⼀题是给定的⼀个 val，实
质是⼀样的。
这⾥数组的删除并不是真的删除，只是将删除的元素移动到数组后⾯的空间内，然后返回数组实际剩余
的元素个数，OJ 最终判断题⽬的时候会读取数组剩余个数的元素进⾏输出。
*/

class Solution{
	public function removeElement($nums,$val){
		$length = count($nums);
		if($length<=0) return 0;
		if($val<0) return $length;
		$count = 0;
		for ($i=0; $i < $length; $i++) { 
			if($nums[$i]^$val) {
				$nums[$count] = $nums[$i];
				$count++;
			}
		}
		return $count;
	}
}
$s = new Solution();
print_r($s->removeElement([0,1,2,2,3,0,4,2], 2));