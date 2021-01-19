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
	// 空间上优化 压缩空间
	function findLength1($A,$B){
		$Alen = count($A);
		$Blen = count($B);	
		
		if($Alen==0||$Blen==0) return [];
		$max = 0;
		$col = $Blen-1;
		$row = 0;
		$i = $j = 0;
		while ($row<$Alen) {
			$i = $row;
			$j = $col;
			$len = 0;
			// 向右下方移动
			while($i<$Alen&&$j<$Blen){
				if($A[$i]!=$B[$j]){
					$len = 0;
				}else{
					$len++;
				}
				if($len>$max){
					$max = $len;
				}
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
echo "<pre>";
$A = [1,2,3,2,1];
$B = [3,2,1,4,7];

var_dump($s->findLength1($A,$B));