<?php
/**
 * 是否是3的幂次方
不使用循环和递归的方式能做到吗
整数3的19次幂是1162261467 在2的31次幂范围内
*/
class Solution{	
	public function isPowerOfThree($n){
		return $n>0&&1162261467%$n==0;
	}
}
$s = new Solution();
echo "<pre>";
var_dump($s->isPowerOfThree(17));
