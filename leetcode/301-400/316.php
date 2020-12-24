<?php
/**
 * 去除重复字母
 * 给定一个仅包含小写字母的字符串，去除字符串中重复的字母，使得每个字母只出现一次。需保证返回结果的字典序最小（要求不能打乱其他字符的相对位置）。 
示例 1: 
输入: “bcabc” 
输出: “abc” 
示例 2: 
输入: “cbacdcbc” 
输出: “acdb”
单调栈 单调递增
 */
class Solution{
	function removeDuplicateLetters($s){
		if(strlen($s)<=1) return $s;
		$stack = [];
		//array_push($stack,$s[0]);
		$map = [];
		$inStack = array_fill(0,26,false);
		//统计每个字符出现次数
		for ($i=0; $i < strlen($s); $i++) { 
			$map[$s[$i]]++;
		}

		for ($i=0; $i < strlen($s); $i++) { 
			if ($inStack[ord($s[$i]) - ord('a')])
                continue;
			while(!empty($stack)&&end($stack)>$s[$i]&&$map[end($stack)]>0){
				$k = array_pop($stack);
				$inStack[ord($s[$i]) - ord('a')] = false;
				//$map[$k] = 0;
			}
			array_push($stack,$s[$i]);
			$map[$s[$i]]--;
			$inStack[ord($s[$i]) - ord('a')] = true;
		}
		$res = '';
		while (!empty($stack)) {
			$res =array_pop($stack).$res;
		}
		return $res;

	}
}

$obj = new Solution();
echo $obj->removeDuplicateLetters("cbacdcbc");