<?php
/**题目
Given a string containing just the characters '(', ')', '{', '}', '[' and ']', determine if the input string is
valid.
An input string is valid if:
Open brackets must be closed by the same type of brackets.
Open brackets must be closed in the correct order.
Note that an empty string is also considered valid.
Example 1:
Input: "()"
Output: true
Example 2:
Input: "()[]{}"
Output: true
Example 3:
Input: "(]"
Output: false
Example 4:
Input: "([)]"
Output: false
Example 5:
Input: "{[]}"
Output: true
题目大意是括号匹配问题。
解题思路
遇到左括号就进栈push，遇到右括号并且栈顶为与之对应的左括号，就把栈顶元素出栈。最后看栈里面
还有没有其他元素，如果为空，即匹配。
需要注意，空字符串是满⾜括号匹配的，即输出 true。
*/
class Solution{
	public function isValid($s){
		if($s=='')return "false";
		$slen = strlen($s);
		$arr = [];
		if($slen&1==1) return false;//奇数个为false
		$map = ['(','{','['];
		for ($i=0; $i < $slen; $i++) { 
			if(in_array($s[$i],$map)){
				array_push($arr,$s[$i]);
			}else{
				if($s[$i]==')') {if(array_pop($arr)!='(') return false;}
				if($s[$i]=='}') {if(array_pop($arr)!='{') return false;}
				if($s[$i]==']') {if(array_pop($arr)!='[') return false;}
			}
		}
		if(empty($arr)){
			return true;
		}else{
			return false;
		}
	}
}
$s = new Solution();
echo "<pre>";
var_dump($s->isValid("(("));