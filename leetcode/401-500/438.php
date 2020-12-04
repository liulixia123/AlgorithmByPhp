<?php
/**
 * 找到字符串中所有字母异位词
 * 
 * 滑动窗口
 */
class Solution {
	function findAnagrams($s, $p){
		$left = $right=0;
		//ss用来表示窗口windows，pp用来表示needs
		$ss = $pp = $res = [];
		for ($i=0; $i < strlen($p); $i++) { 
			$pp[ord($p[$i])-ord('a')]++;
			$ss[ord($s[$right++])-ord('a')]++;
		}
		if($ss==$pp) array_push($res,$left);
		while ($right<strlen($s)) {
			 //窗口右移
            $ss[ord($s[$right++])-ord('a')]++;  //窗口右边界右移
            $ss[ord($s[$left++])-ord('a')]--;   //窗口左边界右移
            if($ss==$pp) array_push($res,$left);
		}
		return $res;
	}
}
$s = new Solution();
print_r($s->findAnagrams("abab","ab"));