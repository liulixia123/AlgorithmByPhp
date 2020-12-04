<?php
/**
 * 计算质数
 * 统计所有小于非负整数 n 的质数的数量。 

示例 1：

输入：n = 10
输出：4
解释：小于 10 的质数一共有 4 个, 它们是 2, 3, 5, 7 。
示例 2：

输入：n = 0
输出：0
示例 3：

输入：n = 1
输出：0

 */

class Solution {

    /**
     * 厄拉多塞筛法
     * @param Integer $n
     * @return Integer
     * 如果一个数没有被小于他的数剔除，那么这个数是质数，初始数设置为2；
同时把这个数在所求范围内的倍数标记为合数；
     */
    function countPrimes($n) {
    	$count = 0;
	    $isPrim = array_fill(0,$n,true);
	    for($i=2;$i<$n;$i++){
	        if($isPrim[$i]){
	            $count++;
	            for($j=$i*$i;$j<$n;$j+=$i){
	                $isPrim[$j] = false;
	            }
	        } 
	    }
	    return $count;
    }
}

$s = new Solution();
echo "<pre>";
$n = 10;
print_r($s->countPrimes($n));