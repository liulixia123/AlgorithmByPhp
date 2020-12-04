<?php
/**
 * 比较两个字符串是否相等
 */
function compare($str1,$str2){
	if($str1==$str2) return true;
	if(strlen($str1)!=strlen($str2)) return false;
	$res = 0;
	for ($i=0; $i < strlen($str1); $i++) { 
		$res |= strcmp($str1[$i],$str2[$i]);
	}	
	return $res==0;
}

var_dump(compare("abc","aba"));
