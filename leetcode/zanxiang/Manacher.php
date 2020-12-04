<?php
/**
 * Manacher
 */
//处理字符串前后加上^$符，每个字符间加#
function process($str){
	if($str==""){
		return "^$";
	}
	$res = "^";
	for ($i=0; $i < strlen($str); $i++) { 
		$res .= "#". $str[$i];
	}
	$res .="#$";
	return $res;
}
//马拉车算法
function longestPalindrome2($str){
	$T = process($str);
	$n = strlen($T);
	$C = $R = 0;//C 表示回文串的中心，用 R 表示回文串的右边半径 所以 R = C + P[ i ]
	$P = [];
	for ($i = 1; $i < $n-1; $i++) { 
		$i_mirror = 2*$C -$i; //i 关于 C 的对称点是 i_mirror
		if($R>$i){
			$P[$i] = min($R - $i, $P[$i_mirror]);// 防止超出 R
		}else{
			$P[$i] = 0;// 等于 R 的情况
		}
		// 碰到之前讲的三种情况时候，需要利用中心扩展法
		while ($T[$i+1+$P[$i]] == $T[$i-1-$P[$i]]) {			
			$P[$i]++;
		}
		// 判断是否需要更新 R
		if ($i + $P[$i] > $R) {
            $C = $i;
            $R = $i + $P[$i];
        }
	}
	// 找出 P 的最大值
    $maxLen = 0;
    $centerIndex = 0;
    for ($i = 1; $i < $n - 1; $i++) {
        if ($P[$i] > $maxLen) {
            $maxLen = $P[$i];
            $centerIndex = $i;
        }
    }
    $start = intval(($centerIndex - $maxLen) / 2); //最开始讲的求原字符串下标
    return substr($str, $start,$start + $maxLen);
}
echo longestPalindrome2("abccbaef");