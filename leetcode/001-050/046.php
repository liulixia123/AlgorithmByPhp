<?php
/**题目
Given a collection of distinct integers, return all possible permutations.
Input: [1,2,3]
Output:
[
 [1,2,3],
 [1,3,2],
 [2,1,3],
 [2,3,1],
 [3,1,2],
 [3,2,1]
]

意思就是给定一个没有重复数字的序列，返回其所有可能的全排列。
解题思路求出一个数组的排列组合中的所有排列，用DFS 深搜即可。
回溯算法类
*/

class Solution{
	public $used = [];
	public function permute($nums){
		$length = count($nums);
		if($length==0) return [];
		$res = [];
		$this->permuteAux($nums,0,[],$res);
		return $res;
	}
	private function permuteAux($nums,$index,$list,&$res){
		$length = count($nums);
		if($length==$index){
			array_push($res,$list);
			return ;
		}
		for ($i=0; $i < $length; $i++) { 
			if($this->used[$i]) continue;
			array_push($list,$nums[$i]);
			$this->used[$i] = 1;
			$this->permuteAux($nums,$index+1,$list,$res);
			$this->used[$i] = 0;
			array_pop($list);
		}
		return ;
	}
}
$s = new Solution();
echo "<pre>";
print_r($s->permute([1,2,7]));