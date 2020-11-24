<?php
/**
 * 最长公共子串
 * Input: 
A: [1,2,3,2,1] 
B: [3,2,1,4,7] 
Output: 3 
Explanation: 
The repeated subarray with maximum length is [3, 2, 1].
 */
class Solution{
	function findLength($A,$B){
		$Alen = count($A);
		$Blen = count($B);
		$dp = $res = [];
		$result = 0;
		$dp = array_fill(0,$Alen,array_fill(0,$Blen,0));
		if($Alen==0||$Blen==0) return [];
		for ($i=0; $i < $Alen; $i++) { 
			for ($j=0; $j < $Blen; $j++) { 
				if($A[$i]==$B[$j]){
					$dp[$i][$j] = $dp[$i-1][$j-1]+1;					
					$result = max($result,$dp[$i][$j]);
				}
			}
		}
		
		return $result;
	}
}

$s = new Solution();
echo "<pre>";
$A = [1,2,3,2,1];
$B = [3,2,1,4,7];

var_dump($s->findLength($A,$B));