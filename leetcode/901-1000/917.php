<?php
/**
 * 仅仅反转字母
 * 给定一个字符串 S，返回 “反转后的” 字符串，其中不是字母的字符都保留在原地，而所有字母的位置发生反转。

示例 1：

输入：“ab-cd”
输出：“dc-ba”
示例 2：

输入：“a-bC-dEf-ghIj”
输出：“j-Ih-gfE-dCba”
示例 3：

输入：“Test1ng-Leet=code-Q!”
输出：“Qedo1ct-eeLg=ntse-T!”
字母栈
将 s 中的所有字母单独存入栈中，所以出栈等价于对字母反序操作
 */
class Solution {
	function reverseOnlyLetters($s){
		$stack = [];
		for ($i=0; $i < strlen($s); $i++) { 
			if($this->isLetter($s[$i])){
				array_push($stack,$s[$i]);
			}
		}
		$ans = '';
		for ($i=0; $i < strlen($s); $i++) { 
			if($this->isLetter($s[$i])){
				$ans .= array_pop($stack);
			}else{
				$ans .= $s[$i];
			}
		}
		return $ans;
	}
	function isLetter($s){
		$check = ord($s);
		if(($check>=65&&$check<=90)||($check>=97&&$check<=122)){
			return true;
		}
		return false;
	}
}
$s = new Solution();
echo "<pre>";
print($s->reverseOnlyLetters('ab-cd'));