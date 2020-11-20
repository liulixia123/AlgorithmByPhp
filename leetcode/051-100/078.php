<?php
/*
子集
给定一组不含重复元素的整数数组 nums，返回该数组所有可能的子集（幂集）。

说明：解集不能包含重复的子集。

示例:

输入: nums = [1,2,3]
输出:
[
  [3],
  [1],
  [2],
  [1,2,3],
  [1,3],
  [2,3],
  [1,2],
  []
]

 */
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     * 动态规划求解
     */
    function subsets($nums) {
        $n = count($nums);
        if($n<=0) return [[]];
        $dp[1] = [[],[$nums[0]]];
	    for($i=2;$i<=$n;$i++){
	        $tmpall = [];
	        for($j=0;$j<count($dp[$i-1]);$j++){
	            $tmp = $dp[$i-1][$j];
	            array_push($tmp,$nums[$i-1]);
	            array_push($tmpall,$tmp);
	        }
	        $dp[$i] = array_merge($dp[$i-1],$tmpall);
	    }
	    return $dp[$n];
    }
}

$obj = new Solution();
$nums = [1,2,3];
echo "<pre>";
print_r($obj->subsets($nums));