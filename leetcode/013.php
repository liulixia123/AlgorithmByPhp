<?php
/**题目
Roman numerals are represented by seven different symbols: I , V , X , L , C , D and M .
Example 1:
Input: "III"
Output: 3
Example 2:
Input: "IV"
Output: 4
Example 3:
Input: "IX"
Output: 9
Example 3:
Input: "IX"
Output: 9
Example 4:
Input: "LVIII"
Output: 58
Explanation: L = 50, V= 5, III = 3.
Example 4:
Input: "MCMXCIV"
Output: 1994
Explanation: M = 1000, CM = 900, XC = 90 and IV = 4.
意思就是罗⻢数字包含以下七种字符: I， V， X， L，C，D 和 M。
字符 数值
I 1
V 5
X 10
L 50
C 100
D 500
M 1000
I 可以放在 V (5) 和 X (10) 的左边，来表示 4 和 9。
X 可以放在 L (50) 和 C (100) 的左边，来表示 40 和 90。
C 可以放在 D (500) 和 M (1000) 的左边，来表示 400 和 900。
解题思路
给定一个罗马数字，将其转换成整数。输入确保在 1 到 3999 的范围内。
简单题。按照题中罗马数字的字符数值，计算出对应罗马数字的十进制数即可。
*/

class Solution{
	public function romanToInt($s){
		$roman = [
		'I'=> 1,
		'V'=> 5,
		'X'=> 10,
		'L'=> 50,
		'C'=> 100,
		'D'=> 500,
		'M'=> 1000
	];
		if($s=='')return 0;
		$len = strlen($s);
		$total = 0;//计算结果
		for ($i=0; $i < $len; $i++) { 
			//判断如果前一个数小于后一个数那么，就要减去这个前面的数，加上后面的数即可
			if(($i<$len-1)&&($roman[$s[$i]]<$roman[$s[$i+1]])){
				$total = $total-$roman[$s[$i]];
			}else{
				$total = $total+$roman[$s[$i]];
			}
		}
		return $total;
	}
}
$s = new Solution();
print_r($s->romanToInt('MCMXCIV'));