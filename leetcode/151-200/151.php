<?php
/**
 * 翻转字符串里的单词
 * 给定一个字符串，逐个翻转字符串中的每个单词。

示例:  

输入: "
the sky is blue
",
输出: "
blue is sky the

 */
class Solution {
	function reverseWords($s) {
		$arr = explode(' ', $s);
		$len = count($arr);
		$left = 0;
		$right = $len-1;
		while ($left<$right) {
			$temp = $arr[$left];
			$arr[$left] = $arr[$right];
			$arr[$right]= $temp;
			$left++;
			$right--;
		}
		return implode(" ",$arr);
	}
}
$s = new Solution();
var_dump($s->reverseWords("the sky is blue"));