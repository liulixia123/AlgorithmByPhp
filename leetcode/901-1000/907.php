<?php
/**
 * 子数组最小和
 * 给定一个整数数组 A，找到 min(B) 的总和，其中 B 的范围为 A 的每个（连续）子数组。

由于答案可能很大，因此返回答案模 10^9 + 7。

示例：

输入：[3,1,2,4]
输出：17
解释：
子数组为 [3]，[1]，[2]，[4]，[3,1]，[1,2]，[2,4]，[3,1,2]，[1,2,4]，[3,1,2,4]。 
最小值为 3，1，2，4，1，1，2，1，1，1，和为 17。 
单调栈求解
单调递减
 */
class Solution{
	function sumSubarrayMins($A){
		if(empty($A)) return 0;
		$stack = [];
		$n = count($A);
		$res = 0;		
		
		$k=1;
		foreach ($A as $key => $value) {
			$A[$k++] = $value;
		}				
		$A[$n+1] = 0;	
		for ($i=0; $i <=$n+1; $i++) { 
			while($stack&&$A[end($stack)]>=$A[$i]){
				$j = array_pop($stack);
				$k = end($stack);
				$res+=$A[$j]*($i-$j)*($j-$k);
			}			
			array_push($stack,$i);
		}
		return $res%(10**9 + 7);
	}
}

$obj = new Solution();
$A = [3,1,2,4];
var_dump($obj->sumSubarrayMins($A));