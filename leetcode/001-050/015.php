<?php
/**题目
Given an array nums of n integers, are there elements a, b, c in nums such that a + b + c = 0? Find
all unique triplets in the array which gives the sum of zero.
Given array nums = [-1, 0, 1, 2, -1, -4],
A solution set is:
[
 [-1, 0, 1],
 [-1, -1, 2]
]
意思就是给定一个数组，要求在这个数组中找出 3 个数之和为 0 的所有组合。。
解题思路
我们可以先对数组进行排序，如果是计算两个元素的和的话，我们会分别设置头和尾两个指针，向中间靠拢，
那么三个的话，我们只需要先对第一个数进行循环取值下标i，剩下的两个指针分别指向i+1和数组的最后一个元素，
这样的复杂度是 排序O(nlogn) + 查找O(n^2) = O(n^2)。
*/

class Solution{
	public function threeSum($nums){
		$length = count($nums);
		if($length<3){
			return [];
		}elseif($length==3&&array_sum($nums)==0){
			return $nums;
		}
		sort($nums);
		$res = $temp =[];
		for ($i=0; $i < $length-2; $i++) { 
			$j=$i+1;
			$k = $length-1;
			while ($j<$k) {
				$sum = $nums[$i]+$nums[$j]+$nums[$k];
				if($sum==0){										
					if(count($temp)>1&&in_array($nums[$j],$temp)){
						//pass;
					}else{
						$res[] = [$nums[$i],$nums[$j],$nums[$k]];
						$temp[] = $nums[$i];
						$temp[] = $nums[$j];
						$temp[] = $nums[$k];
					}
					$j++;
					$k--;
				}elseif($sum<0){
					$j++;
				}else{
					$k--;
				}
			}
			
			
		}
		print_r($temp);
		return $res;

	}
	public function threeSum1($nums){
		$length = count($nums);
        if ($length < 3) return [];
        sort($nums);
        if ($nums[0] > 0 || end($nums) < 0) return [];

        $result = [];
        for ($i = 0; $i <= $length - 3; ++$i) {
            if ($nums[$i] > 0) return $result;
            // 去掉重复的
            if ($i > 0 && $nums[$i] == $nums[$i - 1]) continue;
            $left = $i + 1;
            $right = $length - 1;
            while ($left < $right) {
                $sum = $nums[$i] + $nums[$left] + $nums[$right];
                if ($sum == 0) {
                    $result[] = [$nums[$i], $nums[$left], $nums[$right]];
                    // 去掉重复的
                    while ($left < $right && $nums[$left + 1] == $nums[$left]) $left++;
                    while ($left < $right && $nums[$right - 1] == $nums[$left]) $right--;
                    $left++;
                    $right--;
                } elseif ($sum < 0) {
                    $left++;
                } else {
                    $right--;
                }
            }
        }

        return $result;
	}
}
$s = new Solution();
echo "<pre>";
print_r($s->threeSum1([-1, 0, 1, 2, -1, -4]));