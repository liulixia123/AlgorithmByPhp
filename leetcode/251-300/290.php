<?php
/**
 * 单词规律  简单
 * 给定一种规律 pattern 和一个字符串 str ，判断 str 是否遵循相同的规律。

这里的 遵循 指完全匹配，例如， pattern 里的每个字母和字符串 str 中的每个非空单词之间存在着双向连接的对应规律。

示例1:

输入: pattern = "abba", str = "dog cat cat dog"
输出: true
示例 2:

输入:pattern = "abba", str = "dog cat cat fish"
输出: false
示例 3:

输入: pattern = "aaaa", str = "dog cat cat dog"
输出: false
示例 4:

输入: pattern = "abba", str = "dog dog dog dog"
输出: false
说明:
你可以假设 pattern 只包含小写字母， str 包含了由单个空格分隔的小写字母。
 */
class Solution {

    /**
     * @param String $pattern
     * @param String $s
     * @return Boolean
     */
    function wordPattern($pattern, $s) {
    	if($pattern==null||$s==null) return false;
    	$sarr = explode(' ', $s);
    	if(strlen($pattern)!=count($sarr)) return false;
    	$map = [];
    	for ($i=0; $i < strlen($pattern); $i++) { 
    		if(array_key_exists($pattern[$i], $map)){
    			if($map[$pattern[$i]]!=$sarr[$i]){
    				return false;
    			}
    		}else{
    			if(in_array($sarr[$i],$map)) return false;
    			$map[$pattern[$i]] = $sarr[$i];
    		}
    		
    	}
    	return true;
    }
}

$obj = new Solution();
$res = $obj->wordPattern("abba","dog cat cat dog");
var_dump($res);