<?php
/**
 * 合并两个有序数组
 */
class Solution {
	function merge($num1,$num2,$m,$n){
		$k = $m+$n;
		while ($m>0&&$n>0) {
			if($num1[$m-1]>$num2[$n-1]){
				$num1[$k-1] = $num1[$m-1];
				--$k;
				--$m;
			}else{
				$num1[$k-1] = $num2[$n-1];
				--$k;
				--$n;
			}
		}
		while($n>0){
			$num1[$k--] = $num2[$n];
			--$n;
		}
		return $num1;
	}
}
$s = new Solution();
echo "<pre>";
print_r($s->merge([1,2,3,0,0,0],[1,2,5],3,3));