<?php
/**
 * Excel表格列名
 * 1 ->A
 * 2 ->B
 * 3 ->C
 * 26 ->Z
 * 27 ->AA
 * 28 ->AB
 */
class Solution{
	function convertToTitle($n){
		if($n<=0) return ;
		$s = '';
		while($n>0){
			if($n%26==0){
				$s = "Z".$s;
				if($n==26) break;
				
			}else{
				$s = chr(ord('A') + intval($n%26)-1).$s;
			}
			
			$n = intval($n/26);
		}
		return $s;
	}
}
$s = new Solution();
echo "<pre>";
var_dump($s->convertToTitle(701));