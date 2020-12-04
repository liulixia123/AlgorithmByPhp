<?php
/**
 * 用户分组
 * 有 n 位用户参加活动，他们的 ID 从 0 到 n - 1，每位用户都 恰好 属于某一用户组。给你一个长度为 n 的数组 groupSizes，其中包含每位用户所处的用户组的大小，请你返回用户分组情况（存在的用户组以及每个组中用户的 ID）。

你可以任何顺序返回解决方案，ID 的顺序也不受限制。此外，题目给出的数据保证至少存在一种解决方案。

示例 1：

输入：groupSizes = [3,3,3,3,3,1,3]
输出：[[5],[0,1,2],[3,4,6]]
解释：
其他可能的解决方案有 [[2,1,6],[5],[0,4,3]] 和 [[5],[0,6,2],[4,3,1]]。
贪心算法
 */

class Solution{
	function groupThePeople($groupSizes){
		$n = count($groupSizes);
		$group = [];
		$res = [];
		for ($i=0; $i < $n; $i++) { 
			if(!$group[$groupSizes[$i]]){
				$group[$groupSizes[$i]] = [];
			}
			array_push($group[$groupSizes[$i]],$i);
			//分组人数够了
			if(count($group[$groupSizes[$i]])==$groupSizes[$i]){
				array_push($res,$group[$groupSizes[$i]]);
				unset($group[$groupSizes[$i]]);
			}
		}
		return $res;
	}
}
$obj = new Solution();
$groupSizes = [3,3,3,3,3,1,3];
echo "<pre>";
print_r($obj->groupThePeople($groupSizes));