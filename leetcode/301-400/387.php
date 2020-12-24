<?php
/**
 * 字符串中第一个唯一字符
 * 给定一个字符串，找到它的第一个不重复的字符，并返回它的索引。如果不存在，则返回 -1。

示例：
s = "leetcode"
返回 0
s = "loveleetcode"
返回 2
 */
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function firstUniqChar($s) {
    	$map = [];
    	if($s=='') return -1;
    	for ($i=0; $i < strlen($s); $i++) { 
    		$map[$s[$i]]++;
    	}
    	foreach ($map as $key => $value) {
    		if($value==1)return strval(strpos($s,$key));
    	}
    	return -1;
    }
}

$obj = new Solution();
echo $obj->firstUniqChar("leetcode");