<?php
/**题目
Implement pow(x, n), which calculates x raised to the power n (xn).
Example 1:
Input: 2.00000, 10
Output: 1024.00000
Example 2:
Input: 2.10000, 3
Output: 9.26100
Example 3:
Input: 2.00000, -2
Output: 0.25000
Explanation: 2-2 = 1/22 = 1/4 = 0.25
意思就是实现 pow(x, n) ，即计算 x 的 n 次幂函数
解题思路
要求计算 Pow(x, n)
这题用递归的方式，不断的将 n 2 分下去。注意 n 的正负数，n 的奇偶性。
*/

class Solution{
	public function myPow($x,$n){		
		if($n==0) return 1;
		if($n==1) return $x;
		if($n<0){
			$n = -$n;
			$x= 1/$x;
		}
		$temp = $this->myPow($x,intval($n/2));
		return $n&1?$temp*$temp*$x:$temp*$temp;
	}
}
$s = new Solution();
print_r($s->myPow(2.00000,-2));