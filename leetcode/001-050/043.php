<?php
/**
 * 两个字符串相乘
 * nums1 = "2" nums2="3"
 * 结果6
 */
class Solution {
	function multiply($num1,$num2){
		if($num1==""||$num2==""||$num1=="0"||$num2=="0") return 0;
		$len1 = strlen($num1);
		$len2 = strlen($num2);
		$res = array_fill(0,$len1+$len2,0);

		for ($i=$len1-1; $i >=0; $i--) { 
			for ($j=$len2-1; $j >=0; $j--) { 
				$p1 = $i+$j+1;//个位位置
				$p2 = $i+$j;//进位
				$sum = $num1[$i]*$num2[$j]+$res[$p1];
				$res[$p1] =  $sum%10;
				$res[$p2] += intval($sum/10);
			}
		}
		return implode('', $res);
	}

}

$s = new Solution();
var_dump($s->multiply("789","256"));