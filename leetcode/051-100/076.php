<?php
/**
 * 最小覆盖字串
 * 题目描述：
给定一个字符串 S 和一个字符串 T，请在 S 中找出包含 T 所有字母的最小子串。
示例：
输入: S = "ADOBECODEBANC", T = "ABC"
输出: "BANC"
说明：
如果 S 中不存这样的子串，则返回空字符串 ""。
如果 S 中存在这样的子串，我们保证它是唯一的答案。
解题思路：
这道题的要求是要在O(n)的时间度里实现找到这个最小窗口字串，那么暴力搜索Brute Force肯定是不能用的，我们可以考虑哈希表，其中key是T中的字符，value是该字符出现的次数。
- 我们最开始先扫描一遍T，把对应的字符及其出现的次数存到哈希表中。
- 然后开始遍历S，遇到T中的字符，就把对应的哈希表中的value减一，直到包含了T中的所有的字符，纪录一个字串并更新最小字串值。
- 将子窗口的左边界向右移，略掉不在T中的字符，如果某个在T中的字符出现的次数大于哈希表中的value，则也可以跳过该字符。
 */
class Solution{	
	function minWindow($s,$t){
		if(strlen($t)>strlen($s)) return "";		
		$map = [];
		//统计t中字符数量map表
		for($i=0;$i<strlen($t);$i++){
			$map[$t[$i]]++;
		}		
		$count = 0; //计算已经找到T所有字符的记录
		$left = 0;
		$min = PHP_INT_MAX;
		$minStart = $minEnd = 0;
		for ($right=0; $right < strlen($s); $right++) { 
			if(array_key_exists($s[$right], $map)){//向右扩展字符包含T的字符
				$map[$s[$right]]--;
				if($map[$s[$right]]>=0){
					$count++;
				}				
			}					
			while ($count==strlen($t)) {//说明此窗口包含所有T字符，要进行左缩
				if($right-$left<$min){//记录字符长度
					$min = $right-$left;
					$minStart = $left;
					$minEnd = $min;
				}
				if(array_key_exists($s[$left], $map)){//左缩的话说明还需要后面字符匹配T中
					$map[$s[$left]]++;
					if($map[$s[$left]]>0) $count--;
				}
				$left++;
			}
		}		
		return $min==PHP_INT_MAX?"":substr($s,$minStart,$minEnd+1);
	}
}

$obj = new Solution();
$s = "ab";
$t = "b";
var_dump($obj->minWindow($s,$t));