<?php
/**题目
全排列 II
Given a collection of numbers that might contain duplicates, return all possible unique
permutations.
Input: [1,1,2]
Output:
[
 [1,1,2],
 [1,2,1],
 [2,1,1]
]

意思就是给定一个没有重复数字的序列，返回所有不重复的全排列。
解题思路求出一个数组的排列组合中的所有排列，用DFS 深搜即可。
回溯算法类
*/

class Solution{
	public $used = [];
	public function permuteUnique($nums){
		$length = count($nums);
		if($length==0) return [];
		$res = [];
		// 修改 1：首先排序，之后才有可能发现重复分支
		sort($nums);
		$this->findPermuteUnique($nums,0,[],$res);
		return $res;
	}
	private function findPermuteUnique($nums,$index,$list,&$res){
		$length = count($nums);
		if($length==$index){
			array_push($res,$list);
			return ;
		}
		for ($i=0; $i < $length; $i++) { 
			if(!$this->used[$i]){
				// 修改 2：因为排序以后重复的数一定不会出现在开始，故 i > 0

                // 和之前的数相等，并且之前的数还未使用过，只有出现这种情况，才会出现相同分支

                // 这种情况跳过即可				
                if ($i > 0 && $nums[$i] == $nums[$i-1] && !$this->used[$i-1]) {
                    continue;

                }
                array_push($list,$nums[$i]);
				$this->used[$i] = 1;
				$this->findPermuteUnique($nums,$index+1,$list,$res);
				$this->used[$i] = 0;
				array_pop($list);
			}
			
			
		}
		return ;
	}
}
$s = new Solution();
echo "<pre>";
print_r($s->permuteUnique([1,1,2]));