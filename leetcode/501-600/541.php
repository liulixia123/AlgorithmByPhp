<?php
/**
 * 反转字符串II
 * 给定一个字符串和一个整数 k，你需要对从字符串开头算起的每个 2k 个字符的前k个字符进行反转。如果剩余少于 k 个字符，则将剩余的所有全部反转。如果有小于 2k 但大于或等于 k 个字符，则反转前 k 个字符，并将剩余的字符保持原样。
 * 示例:

输入: s = “abcdefg”, k = 2
输出: “bacdfeg” 
要求:

该字符串只包含小写的英文字母。
给定字符串的长度和 k 在[1, 10000]范围内。

循环反转，设置一个指针cur，则[cur,cur+k)部分反转，[cur+k,cur+2k)保持不变。然后指针向右移动2k，同时剩余字符个数减少2k个。
调用字符串substring(start,end)方法截取字符串[start,end)部分，进行相应的操作，利用StringBuffer的reverse()方法反转。
 */
class Solution{	
	public function reverseStr($str,$k){
		$cur = 0;
		$len = strlen($str);
		$newstr = '';
		while($len>=2*$k){
			//反转cur，cur+k
			$newstr .= strrev(substr($str, $cur,$k)).substr($str, $cur+$k,$k);
			$len -= 2*$k;
			$cur += 2*$k;
		}
		
		if($len<$k){
			$newstr .= strrev(substr($str, $cur));
		}else if($len<2*$k){
					
			$newstr .= strrev(substr($str, $cur,$k)).substr($str, $cur+$k);
		}
		return $newstr;

	}
}
$s = new Solution();
echo "<pre>";
print_r($s->reverseStr('abcdefg',2));
