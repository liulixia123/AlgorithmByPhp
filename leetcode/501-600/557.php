<?php
/**
 *  反转字符串中的单词 III
 *  给定一个字符串，你需要反转字符串中每个单词的字符顺序，同时仍保留空格和单词的初始顺序。
示例 1:
输入: “Let’s take LeetCode contest”
输出: “s’teL ekat edoCteeL tsetnoc”
注意：在字符串中，每个单词由单个空格分隔，并且字符串中不会有任何额外的空格。
 */
class Solution{
	function reverseWords($s){
		$m = strlen($s);
	    if($m<=1) return $s;
	    $num = explode(" ", $s);
	    foreach ($num as $key => $value) {
	    	$num[$key] = $this->reverse($value);
	    }
	    return implode(" ", $num);
	}
	function reverse($s){
		$n = strlen($s);
		$l = 0;
		$r = $n-1;
		while($l<$r){
			$temp = $s[$l];
			$s[$l] = $s[$r];
			$s[$r] = $temp;
			$l++;
			$r--;
		}
		return $s;
	}
}
$obj = new Solution();
$s = "Let's take LeetCode contest";

var_dump($obj->reverseWords($s));