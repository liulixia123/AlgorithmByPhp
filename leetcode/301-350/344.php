<?php
/**
 * 反转字符串
输入：["h","e","l","l","o"]
输出：["o","l","l","e","h"]
输入：["H","a","n","n","a","h"]
输出：["h","a","n","n","a","H"]
从两头往中间走
 */
class Solution{	
	public function reverseString($str){
		$i = 0;
		$j = strlen($str)-1;
		for ($i=0; $i < intval(strlen($str)/2); $i++) { 
			$temp = $str[$i];
			$str[$i] = $str[$j];
			$str[$j] = $temp;
			$j--;
		}
		return $str;

	}
}
$s = new Solution();
echo "<pre>";
print_r($s->reverseString('helloq'));