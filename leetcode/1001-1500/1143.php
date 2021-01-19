<?php
/**
 * 最长公共子序列
 */

class Solution{
	function LCS($s1,$s2){
		$s1len = strlen($s1);
		$s2len = strlen($s2);
		if($s1len==0||$s2len==0){
			return ;
		}
		$dp = [];
		$dp[-1][0] = 0;
		$dp[0][-1] = 0;
		for ($i=0; $i < $s1len; $i++) { 
			for($j=0; $j < $s2len; $j++){
				if($s1[$i]==$s2[$j]){
					$dp[$i][$j] =max($dp[$i-1][$j],$dp[$i][$j-1])+1;
				}else{
					$dp[$i][$j] =max($dp[$i-1][$j],$dp[$i][$j-1]);
				}
			}
		}
		return $dp[$s1len-1][$s2len-1];
	}
	//空间上压缩
	function LCS1($s1,$s2){
		$s1len = strlen($s1);
		$s2len = strlen($s2);
		if($s1len==0||$s2len==0){
			return ;
		}
		$col = $s2len-1;
		$row = 0;
		$max = 0;
		$len = 0;
		while($row<$s1len){
			$i = $row;
			$j = $col;			
			while($i<$s1len&&$j<$s2len){
				if($s1[$i]==$s2[$j]){
					$len++;
				}
				$max = max($max,$len);				
				$i++;
				$j++;
			}
			if($col>0){
				$col--;
			}else{
				$row++;
			}
		}
		return $max;
	}
}

$s = new Solution();
var_dump($s->LCS1("aebcdef","abcrdf"));