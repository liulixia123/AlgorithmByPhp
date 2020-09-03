<?php
/**题目
Suppose an array sorted in ascending order is rotated at some pivot unknown to you
beforehand.
(i.e., [0,1,2,4,5,6,7] might become [4,5,6,7,0,1,2] ).
You are given a target value to search. If found in the array return its index, otherwise return -1 .
You may assume no duplicate exists in the array.
Your algorithm's runtime complexity must be in the order of O(log n).
Example 1:
Input: nums = [4,5,6,7,0,1,2], target = 0
Output: 4
Example 2:
Input: nums = [4,5,6,7,0,1,2], target = 3
Output: -1
意思就是假设按照升序排序的数组在预先未知的某个点上进行了旋转。( 例如，数组 [0,1,2,4,5,6,7] 可能变为
[4,5,6,7,0,1,2] )。搜索一个给定的目标值，如果数组中存在这个目标值，则返回它的索引，否则返回 -1
。你可以假设数组中不存在重复的元素。
你的算法时间复杂度必须是 O(log n) 级别。
解题思路
给出一个数组，数组中本来是从小到大排列的，并且数组中没有重复数字。但是现在把后面随机一
段有序的放到数组前面，这样形成了前后两端有序的子序列。在这样的一个数组里面查找一个数，
设计一个 O(log n) 的算法。如果找到就输出数组的下标，如果没有找到，就输出 -1 。
由于数组基本有序，虽然中间有一个“断开点”，还是可以使二分搜索的算法来实现。现在数组前
一段是数值比较较大的数，后一段是数值偏小的数。如果 mid 落在了前一段数值比较大的区间
内了，那么一定有 nums[mid] > nums[low] ，如果是落在后一段数值比较小的区间内，
nums[mid] ≤ nums[low] 。如果 mid 落在了后一段数值比较小的区间内了，那么一定有
nums[mid] < nums[high] ，如果是落在前一段数值比较大的区间内， nums[mid] ≤
nums[high] 。还有 nums[low] == nums[mid] 和 nums[high] == nums[mid] 的情况，单独
处理即可。最后找到则输出 mid，没有找到则输出 -1 。
*/

class Solution{
	public function search33($nums,$target){
		$length = count($nums);
		if($length==0){
			return -1;
		}
		$low = 0;
		$high = $length-1;		
		while($low<=$high){
			$mid = $low+(($high-$low)>>1);			
			if($nums[$mid]==$target){
				return $mid;
			}elseif($nums[$mid]>$nums[$low]){// 在数值较大部分区间⾥
				if($nums[$low]<=$target&&$target<$nums[$mid]){
					$high = $mid-1;
				}else{
					$low = $mid+1;
					
				}
			}elseif($nums[$mid]<$nums[$high]){//在数值较小部分区间⾥
				if($nums[$mid]<$target&&$target<=$nums[$high]){
					$low = $mid+1;
				}else{
					$high = $mid-1;
				}
			}else{
				if($nums[$mid] == $nums[$low]){
					$low++;
				}
				if($nums[$mid] == $nums[$high]){
					$high--;
				}
			}
		}
		return -1;
	}
}
$s = new Solution();
print_r($s->search33([4,5,6,7,0,1,2],3));