<?php
/**
 * 845.数组中最长山脉
我们把数组 A 中符合下列属性的任意连续子数组 B 称为 “山脉”：

B.length >= 3
存在 0 < i < B.length - 1 使得 B[0] < B[1] < ... B[i-1] < B[i] > B[i+1] > ... > B[B.length - 1]
（注意：B 可以是 A 的任意子数组，包括整个数组 A。）

给出一个整数数组 A，返回最长 “山脉” 的长度。

如果不含有 “山脉” 则返回 0。
示例 1：

输入：[2,1,4,7,3,2,5]
输出：5
解释：最长的 “山脉” 是 [1,4,7,3,2]，长度为 5。
示例 2：

输入：[2,2,2]
输出：0
解释：不含 “山脉”。

解题思路：动态规划
 */
class Solution {

    /**
     * @param Integer[] $A
     * @return Integer
     */
    function longestMountain($A) {
    	$n = count($A);
    	if($n<=0) return 0;
    	$ans = 0;
    	$left = array_fill(0, $n, 0);//记录左半高峰长度
    	$right = array_fill(0, $n, 0);//记录右半高峰长度
    	for ($i=1; $i < $n; $i++) { 
    		$left[$i] = $A[$i]>$A[$i-1]?$left[$i-1]+1:0;
    	}
    	for ($j=$n-2; $j >=0; $j--) { 
    		$right[$j] = $A[$j]>$A[$j+1]?$right[$j+1]+1:0;
    	}
    	for ($i=0; $i < $n; $i++) { 
    		if($left[$i]>0&&$right[$i]>0){
    			$ans = max($ans,$left[$i]+$right[$i]+1);
    		}
    	}
    	return $ans;
    }
}