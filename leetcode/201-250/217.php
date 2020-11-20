<?php
/**
 * 存在重复元素
 给定一个整数数组，判断是否存在重复元素。
 */
class Solution{
	function containsDuplicate($nums){
		$n = count($nums);
		if($n<=0) return false;
		$map = [];
		for ($i=0; $i < $n; $i++) { 
			if(!$map[$nums[$i]]){
				$map[$nums[$i]] = 1;
			}
		}
		return count($map)==$n?false:true;
	}
}

$s = new Solution();
echo "<pre>";
var_dump($s->containsDuplicate([1,2,1,3,4]));