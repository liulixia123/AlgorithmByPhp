<?php
/**题目
Given a 32-bit signed integer, reverse digits of an integer.
Example 1:
Input: 123
Output: 321
Example 2:
Input: -123
Output: -321
Example 3:
Input: 120
Output: 21
意思就是给出一个 32 位的有符号整数，你需要将这个整数中每位上的数字进行反转。注意:假设我们的环境只能
存储得下 32 位的有符号整数，则其数值范围为 [−2^31, 2^31 − 1]。请根据这个假设，如果反转后整数
溢出那么就返回 0。
解题思路这一题是简单题，要求反转 10 进制数。类似的题有第 190 题。
这题只需要注意一点，反转以后的数字要求在 [−2^31, 2^31 − 1]范围内，超过这个范围的数字
都要输出 0 。
*/

class Solution{
	public function reverse7($num){
		$temp = 0;
		while ($num!=0) {
			$temp = $temp*10+$num%10;
			$num = intval($num/10);
			//echo $num;
		}
		if($temp>1<<31-1||$temp<-(1<<31)){
			return 0;
		}
		return $temp;
	}
}
$s = new Solution();
print_r($s->reverse7(120));