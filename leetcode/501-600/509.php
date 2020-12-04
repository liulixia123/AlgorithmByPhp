<?php
/**
 * 斐波那契数
 */
class Solution{
	public function fib($n){
		$dp = [0,1];
		for ($i=2; $i <= $n; $i++) { 
			$dp[$i] = $dp[$i-1]+$dp[$i-2];
		}
		return $dp[$n];
	}
}
$s = new Solution();
print_r($s->fib(2));