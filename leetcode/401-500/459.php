<?php
/**
 * 重复的子字符串
 * 给定一个非空字符串，判断它是否可以通过自身的子串重复若干次构成。你可以假设字符串只包含小写英文字母，并且长度不会超过10000
 * KMP最快的解法
 */
class Solution {
	function repeatedSubstringPattern($str){
		if($str=="") return false;
		$len = strlen($str);
		if($len==1) return true;
		$next = array(0,$len,0);
		for ($i=1; $i < $len; $i++) { 
			$k = $next[$i-1];
			while($str[$i]!=$str[$k]&&$k>0){
				$k = $next[$k-1];
			}
			if($str[$i]==$str[$k]){
				$next[$i] = $k + 1;
			}
		}
		$p = end($next);
		return $p>0&&$len%($len-$p)==0;
	}
}

$s = new Solution();
echo "<pre>";
var_dump($s->repeatedSubstringPattern("abcdabcabcdabcdc"));