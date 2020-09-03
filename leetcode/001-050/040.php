<?php
/**题目
Given a collection of candidate numbers ( candidates ) and a target number ( target ), find all
unique combinations in candidates where the candidate numbers sums to target .
Each number in candidates may only be used once in the combination.
Note:
All numbers (including target ) will be positive integers.
The solution set must not contain duplicate combinations.
Example 1:
Input: candidates = [10,1,2,7,6,1,5], target = 8,
A solution set is:
[
 [1, 7],
 [1, 2, 5],
 [2, 6],
 [1, 1, 6]
]
Example 2:
Input: candidates = [2,5,2,1,2], target = 5,
A solution set is:
[
 [1,2,2],
 [5]
]
意思就是给定一个数组 candidates 和一个目标数 target ，找出 candidates 中所有可以使数字和为 target 的组
合。
candidates 中的每个数字在每个组合中只能使一次。
解题思路
题⽬要求出总和为 sum 的所有组合，组合需要去重。这⼀题是第 39 题的加强版，第 39 题中元素
可以重复利用(重复元素可无限次使用)，这题中元素只能有限次数的利用，因为存在重复元素，
并且每个元素只能用一次(重复元素只能使用有限次)
这题和第 47 题类似，只不过元素可以反复使用。
类似上一题，
不同之处是这道题不允许重复使用candidates中的元素。
我们可以直接在上一道题目的代码上修改，递归的时候将 pos 加 1（需判断是否超出candidates的范围），另外由于题目输入的candidates可能包含相同的元素，所以我们需要对得到的答案进行去重处理。
*/

class Solution{
	public function combinationSum2($candidates,$target){
		$length = count($candidates);
		if($length==0) return [[]];
		$res = [];
		sort($candidates);
		$this->findcombinationSum2($candidates,$target,[],0,$res);
		//去重
		$us_res = [];
		foreach ($res as $key => $value) {
			if(!in_array($value,$us_res)){
				$us_res[] = $value;
			}
		}
		return $us_res;
	}
	public function findcombinationSum2($candidates,$target,$list,$pos,&$res){
		if($target<=0){
			if($target==0){
				$res[] = $list;
				return;
			}			
		}
		$length = count($candidates);
		for ($i=$pos; $i < $length; $i++) { 
			if($candidates[$i]<=$target){//没有超过target有可能产生可行解				
				if($i+1<=$length){
					array_push($list, $candidates[$i]);
					$this->findcombinationSum2($candidates,$target-$candidates[$i],$list,$i+1,$res);
					array_pop($list);
				}				
			}else{
				break;
			}
		}
	}

}
$s = new Solution();
echo "<pre>";
print_r($s->combinationSum2([10,1,2,7,6,1,5], 8));