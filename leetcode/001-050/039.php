<?php
/**题目
Given a set of candidate numbers ( candidates ) (without duplicates) and a target number
( target ), find all unique combinations in candidates where the candidate numbers sums to
target .
The same repeated number may be chosen from candidates unlimited number of times.
Note:
All numbers (including target ) will be positive integers.
The solution set must not contain duplicate combinations.
Example 1:
Input: candidates = [2,3,6,7], target = 7,
A solution set is:
[
 [7],
 [2,2,3]
]
Example 2:
Input: candidates = [2,3,5], target = 8,
A solution set is:
[
 [2,2,2,2],
 [2,3,3],
 [3,5]
]
意思就是给定一个无重复元素的数组 candidates 和一个目标数 target ，找出 candidates 中所有可以使数字和
为 target 的组合。
candidates 中的数字可以无限制重复被选取。
解题思路
题目要求出总和为 sum 的所有组合，组合需要去重。
这一题和第 47 题类似，只不过元素可以反复使用。
回溯法搜索(排列树)
step 1 : 排序
step 2 : 回溯搜索 , 将每一个可行解保存到res集合中
 剪枝方案: 
 1.经过排序后 如  2, 3, 6 ,7
 先选一个数,如果这个数加上已经在可行解中的数没有超过target 如 (sum:4)+2 <= (target:7)说明这个数有可能产生可行解(sum=target)
 将其加入到可行解中(2,2,2).
           如果这个数加上已经在可行解中的数超过了target   如 (sum:6)+2 <= (target:7)说明这个数已经不可能产生可行解了
 2.每次选择的数都是从candidates中选择的[2,3,6,7](遍历方式,从小到大)
   如果2+sum>target , 那么还有必要尝试选择3,6,7吗?显然没有必要了.
 3.根据题目要求.产生的可行解也是递增的
   如[2,2,3]  可以
     [3,2,2]  不可以
     [3,2,3]  不可以
   也就是说,如果当前选择的数为3,那么下一层就不能选择2        
           如果当前选择的数为6,那么下一层就不能选择2,3   (通过遍历时对起始下标的控制能很好的解决这个问题)
*/

class Solution{
	public function combinationSum($candidates,$target){
		$length = count($candidates);
		if($length==0) return [[]];
		$res = [];
		sort($candidates);
		$this->findcombinationSum($candidates,$target,[],0,$res);
		return $res;
	}
	public function findcombinationSum($candidates,$target,$list,$pos,&$res){
		if($target<=0){
			if($target==0){
				$res[] = $list;
				return;
			}			
		}
		$length = count($candidates);
		for ($i=$pos; $i < $length; $i++) { 
			if($candidates[$i]<=$target){//没有超过tartgety有可能产生可行解
				array_push($list, $candidates[$i]);
				$this->findcombinationSum($candidates,$target-$candidates[$i],$list,$i,$res);
				array_pop($list);
			}else{
				break;
			}
		}
	}

}
$s = new Solution();
var_dump($s->combinationSum([2,3,6,7], 7));