<?php
/**
 * 最大连续1的个数
 * 给定一个二进制数组，计算最大连续1的个数
 * input: [1,1,0,1,1,1]
Output: 3
Explanation: The first two digits or the last three digits are consecutive 1s.
    The maximum number of consecutive 1s is 3.
 */
class Solution {
	function findMaxConsecutiveOnes($nums){
		if(empty($nums)) return 0;
		$n = count($nums);
		$max = 0;
		$sum = 0;
		for ($i=0; $i < $n; $i++) { 
			if($nums[$i]==1) {
				$sum++;
				$max = max($max,$sum);
			}else{
				$sum = 0;
			}

		}
		return $max;
	}
}
$obj = new Solution();
echo $obj->findMaxConsecutiveOnes([1,1,0,1,1,1,1]);