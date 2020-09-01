<?php
/**题目
Given two integers dividend and divisor , divide two integers without using multiplication,
division and mod operator.
Return the quotient after dividing dividend by divisor .
The integer division should truncate toward zero
Example 1:
Input: dividend = 10, divisor = 3
Output: 3
Example 2:
Input: dividend = 7, divisor = -3
Output: -2
意思就是给定两个整数，被除数 dividend 和除数 divisor。将两数相除，要求不使用乘法、除法和 mod 运算
符。返回被除数 dividend 除以除数 divisor 得到的商。
说明:
被除数和除数均为 32 位有符号整数。
除数不为 0。
假设我们的环境只能存储 32 位有符号整数，其数值范围是 [−2^31, 2^31 − 1]。本题中，如果除
法结果溢出，则返回 2^31 − 1。

解题思路给出除数和被除数，要求计算除法运算以后的商。注意值的取值范围在 [−2^31, 2^31 − 1] 之中。
超过范围的都按边界计算。
这⼀题可以二分搜索来做。要求除法运算之后的商，把商作为要搜索的目标。商的取值范围是
[0, dividend]，所以从 0 到被除数之间搜索。利用二分，找到(商 + 1 ) * 除数 > 被除数并且 商 * 除
数 ≤ 被除数 或者 (商+1)* 除数 ≥ 被除数并且商 * 除数 < 被除数的时候，就算找到了商，其余情况
继续⼆分即可。最后还要注意符号和题⽬规定的 Int32 取值范围。
⼆分的写法常写错的 3 点：
1. low ≤ high (注意⼆分循环退出的条件是⼩于等于)
2. mid = low + (high-low)>>1 (防⽌溢出)
3. low = mid + 1 ; high = mid - 1 (注意更新 low 和 high 的值，如果更新不对就会死循环)

当被除数大于等于除数时(否则的话就为0了)，我们设置两个变量t和p，并分别初始化为除数和1(最小的情况)，
当被除数大于等于t的二倍时，将t和p同时扩大二倍(左移)，并将返回值加上p，除数减去t。
拿十进制举例:29除以8，8扩大二倍，16小于29，再扩大二倍，超过29，于是29减去之前的16，返回值加上2。
第二次循环时因为此时的13小于8的二倍，故加上1，整个循环结束，最终结果为2+1=3，符合要求。此外还要注意判断结果正负号时亦或的作用

*/

class Solution{
	public function divide($dividend,$divisor){
		if($divisor==0) return 0;
		if($dividend>1<<31-1 ||$divisor>1<<31-1||$dividend<-(1<<31) ||$divisor<-(1<<31)) return "超出整数范围";
		$res = 0;//结果
		$m = abs($dividend);
		$n = abs($divisor);
		//判断正数还是负数
		$sign = ($dividend<0)^($divisor<0)?-1:1;
		if($n==1) return $sign==1?$m:-$m;
		while ($m>=$n) {
			$t = $n;$p=1;
			while($m>$t<<1){
				$t<<=1;
				$p<<=1;
			}
			$res +=$p;
			$m-=$t;
		}
		return $sign>0?$res:-$res;
	}
}
$s = new Solution();
print_r($s->divide(10,-3));