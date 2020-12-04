<?php
/**
 * KMP算法
 */

// 生成Next数组
function getNexts($pattern) {
	$next = [];
	$j = 0;
	$next = [0,0];
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

$str = "ATGTGAGCTGGTGTGTGCFAA";
$pattern = "GTGTGCF";
$index = kmp($str, $pattern);
echo "首次出现位置：".$index;