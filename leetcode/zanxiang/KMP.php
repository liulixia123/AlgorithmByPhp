<?php
/**
 * KMP算法
 */

// 生成Next数组
// a b c a b c d
//-1 0 0 0 1 2 3
//G T G T G C F
//-10 0 1 2 3 0
function getNexts($pattern) {
	$next = [];
	$j = 0;
	$next = [-1,0];//第一个字符没有前缀和后缀默认为-1，第二个字符前缀不能包括自己所以默认是0
	for ($i = 2; $i<strlen($pattern); $i++) {
		while ($j != 0 && $pattern[$j] != $pattern[$i-1]) {
			//从next[i+1]的求解回溯到 next[j]
		    $j = $next[$j];
		}
		if ($pattern[$j] == $pattern[$i-1]) {
		    $j++;
		}
		$next[$i] = $j;
	}
	return $next;
}

// KMP算法主体逻辑。str是主串，pattern是模式串
function kmp($str, $pattern) {
	//预处理，生成next数组
	$next = getNexts($pattern);
	print_r($next);
	$j = 0;
	//主循环，遍历主串字符
	for ($i = 0; $i < strlen($str); $i++) {
		while ($j > 0 && $str[$i] != $pattern[$j]) {
		//遇到坏字符时，查询next数组并改变模式串的起点
		        $j = $next[$j];
		}
		if ($str[$i] == $pattern[$j]) {
		    $j++;
		}
		if ($j == strlen($pattern)) {
		    //匹配成功，返回下标
		    return $i - strlen($pattern) + 1;
		}
	}
	return -1;
}
function getNexts1($pattern){
	$next = [];
	$j = 0;
	$next = [-1,0];
	$j = 0;
	for ($i=2; $i < strlen($pattern); $i++) { 
		if($pattern[$j]==$pattern[$i-1]){
			$j++;
		}elseif($next[$j]==-1){
			$j = 0;
		}else{
			$j = $next[$j];
		}
		$next[$i] = $j;
	}
	return $next;
}
function KMP1($str,$pattern){
	$next = getNexts1($pattern);
	$l1 = 0;
	$l2 = 0;	
	while ($l1<strlen($str)&&$l2<strlen($pattern)) {
		if($str[$l1]==$pattern[$l2]){
			$l1++;
			$l2++;
		}elseif($next[$l2]==-1){
			$l1++;
		}else{
			$l2 = $next[$l2];
		}
	}
	return $l2 == strlen($pattern)?$l1-$l2:-1;
}

$str = "ATGTGAGCTGGTGTGTGCFAA";
$pattern = "GTGTGCF";
$index = KMP1($str, $pattern);
echo "首次出现位置：".$index;