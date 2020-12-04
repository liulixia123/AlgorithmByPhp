<?php
/**
 * 字符串的排列
 * 给定两个字符串S1，S2，判断S2是否包含S1的排列
 * right指针增加，先找到满足所有字符出现的字符串；left指针增加，不断减少得到满足条件的最短子串
 */
class Solution{
	public function checkInclusion($s1,$s2){
		if(strlen($s1)>strlen($s2)) return false;
		$need = [];//s1的字符集计数
		$window = [];//window 的字符统计
		for ($i=0; $i < strlen($s1); $i++) { 
			$need[$s1[$i]]++;
		}
		$left = $right = 0;
		$match = 0;//匹配上的字符个数
		while ($right<=strlen($s2)) {
			$c1 = $s2[$right];
			if($need[$c1]){
				$window[$c1]++;
				if($window[$c1]==$need[$c1]){
					$match++;
				}
			}
			$right++;
			while ($match==count($need)){// 满足匹配并且				
				if($right-$left==strlen($s1)){//窗口大小为S1的长度，窗口内字串为s1的排列					
					return true;
				}
				$c2 = $s2[$left];
				if($need[$c2]){
					$window[$c2]--;
					if($window[$c2]<$need[$c2]){
						$match--;
					}
				}
				$left++;
			}
		}
		return false;
	}
}
$obj = new Solution();
$s1 = "ab";
$s2 = "eidbaoo";
var_dump($obj->checkInclusion($s1,$s2));