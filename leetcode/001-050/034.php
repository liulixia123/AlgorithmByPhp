<?php
/**题目
Given an array of integers nums sorted in ascending order, find the starting and ending position
of a given target value.
Your algorithm's runtime complexity must be in the order of O(log n).
If the target is not found in the array, return [-1, -1] .
Example 1:
Input: nums = [5,7,7,8,8,10], target = 8
Output: [3,4]
Example 2:
Input: nums = [5,7,7,8,8,10], target = 6
Output: [-1,-1]
意思就是给定一个按照升序排列的整数数组 nums，和一个目标值 target。找出给定目标值在数组中的开始位置
和结束位置。你的算法时间复杂度必须是 O(log n) 级别。如果数组中不存在目标值，返回 [-1, -1]。
解题思路
给出一个有序数组 nums 和一个数 target ，要求在数组中找到第⼀个和这个元素相等的元素下
标，最后⼀个和这个元素相等的元素下标。
这⼀题是经典的二分搜索变种题。二分搜索有 4 种基础变种题：
1. 查找第一个值等于给定值的元素
2. 查找最后一个值等于给定值的元素
3. 查找第一个大于等于给定值的元素
4. 查找最后一个大于等于给定值的元素
这⼀题的解题思路可以分别利用变种 1 和变种 2 的解法就可以做出此题。或者第一次变种 1 的方法，然后循环往后找到最后一个与给定值相等的元素。不过后者这种方法可能会使时间复杂度下降
到 O(n)，因为有可能数组中 n 个元素都和给定元素相同。(4 个基础变种的实现代码)。
*/

class Solution{
	public function searchRange($nums,$target){
		return [$this->searchFirstEqualElement($nums,$target),$this->searchLastEqualElement($nums,$target)];
	}
	// 二分查找第一个与 target 相等的元素，时间复杂度 O(logn)
	public function searchFirstEqualElement($nums,$target){
		$length = count($nums);
		if($length==0){
			return -1;
		}
		$low = 0;
		$high = $length-1;		
		while($low<=$high){
			$mid = $low+(($high-$low)>>1);
			if($nums[$mid]>$target){
				$high = $mid-1;
			}elseif($nums[$mid]<$target){
				$low = $mid+1;
			}else{
				if($mid==0||$nums[$mid-1]!=$target){
					// 找到第一个与target 相等的元素
					return $mid;
				}
				$high = $mid-1;
			}
		}
		return -1;
	}
	// 二分查找最后一个与 target 相等的元素，时间复杂度 O(logn)
	public function searchLastEqualElement($nums,$target){
		$length = count($nums);
		if($length==0){
			return -1;
		}
		$low = 0;
		$high = $length-1;		
		while($low<=$high){
			$mid = $low+(($high-$low)>>1);
			if($nums[$mid]>$target){
				$high = $mid-1;
			}elseif($nums[$mid]<$target){
				$low = $mid+1;
			}else{
				if($mid==$length-1||$nums[$mid+1]!=$target){
				// 找到最后一个与target 相等的元素
					return $mid;
				}
				$low = $mid+1;
			}
		}
		return -1;
	}
	// 二分查找第一个大于等于 target元素，时间复杂度 O(logn)
	public function searchFirstGreaterElement($nums,$target){
		$length = count($nums);
		if($length==0){
			return -1;
		}
		$low = 0;
		$high = $length-1;		
		while($low<=$high){
			$mid = $low+(($high-$low)>>1);
			if($nums[$mid]>=$target){
				if($mid==0||$nums[$mid-1]<$target) {
				//找到第一个大于等于 target 的元素
				 	return $mid;	
				}
				$high = $mid-1;
			}else{
				$low = $mid+1;
			}
		}
		return -1;
	}
	// 二分查找最后一个小于等于 target 的元素，时间复杂度 O(logn)
	public function searchLastLessElement($nums,$target){
		$length = count($nums);
		if($length==0){
			return -1;
		}
		$low = 0;
		$high = $length-1;		
		while($low<=$high){
			$mid = $low+(($high-$low)>>1);
			if($nums[$mid]<=$target){
				if($mid==$length-1||$nums[$mid+1]>$target){//找到最后一个小于等于target的元素
					return $mid;
				}
				$low =$mid+1;
			}else{
				$high = $mid-1;
			}
			
		}
		return -1;
	}
}
$s = new Solution();
print_r($s->searchRange([5,7,7,8,8,10],6));