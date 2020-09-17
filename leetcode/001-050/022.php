<?php
/**题目
Given n pairs of parentheses, write a function to generate all combinations of well-formed
parentheses.
For example, given n = 3, a solution set is:
[
 "((()))",
 "(()())",
 "(())()",
 "()(())",
 "()()()"
]

题目大意给出 n 代表组成括号的对数，请你写出一个函数，使其能够组成所有可能的并且有效的括号组合。
解题思路
这道题乍一看需要判断括号是否匹配的问题，如果真的判断了，那时间复杂度就到 O(n * 2^n)了，
虽然也可以 AC，但是时间复杂度巨⾼。
DFS 深度优先搜索
这道题实际上不需要判断括号是否匹配的问题。因为在 DFS 回溯的过程中，会让 ( 和 ) 成对的
匹配上的。
//产生左右分支条件是n>0
//产生左分支时，是否还有左括号可使用
//产生右分支时，受左分支限制，右括号只有严格的按照数量大于左分支数量才能产生右括号
当左右数量等于0时才结算
*/
class Solution{
	public function generateParenthesis($n){
		if($n<=0)return [];
		$res = [];//结果集
		$this->backtracking('',$n,$n,$res);
		return $res;
	}
	private function backtracking($s='',$left,$right,&$res){		
		if($left==0&&$right==0) {
			array_push($res,$s);
			return ;
		}
		if($left>$right) return;
		if($left>0) $this->backtracking($s.'(',$left-1,$right,$res);
		if($right>0) $this->backtracking($s.')',$left,$right-1,$res);
	}
}
$s = new Solution();
echo "<pre>";
print_r($s->generateParenthesis(3));