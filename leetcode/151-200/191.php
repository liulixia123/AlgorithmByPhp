<?php
/**题目
位 1 的个数
编写一个函数，输入是一个无符号整数，返回其二进制表达式中数字位数为 ‘1’ 的个数（也被称为汉明重量）。
输入：00000000000000000000000000001011
输出：3
解释：输入的二进制串 00000000000000000000000000001011 中，共有三位为 '1'。
输入：00000000000000000000000010000000
输出：1
解释：输入的二进制串 00000000000000000000000010000000 中，共有一位为 '1'。
输入：11111111111111111111111111111101
输出：31
解释：输入的二进制串 11111111111111111111111111111101 中，共有 31 位为 '1'。
n&(n-1) 消除最后一位1，消除多少个1就有多个1
*/

class Solution{
	public function hammingWeight($n){
		$count = 0;
		while($n>0){
			$count++;
			$n= $n&($n-1);
		}
		return $count;
	}
}
$s = new Solution();
print_r($s->hammingWeight(3));