<?php
/**
 * 分发糖果
 *
 * 贪心算法
 */

class Solution {

    /**
     * @param Integer[] $ratings
     * @return Integer
     */
    function candy($ratings) {
    	$n = count($ratings);
    	$candies = [];
    	$candies = array_fill(0, $n, 1);//每个小孩至少有一个糖
    	//从前往后遍历，当前位置比前一个位置大，前一位置+1
    	for ($i=1; $i < $n; $i++) { 
    		if($ratings[$i]>$ratings[$i-1]){
    			$candies[$i] = $candies[$i-1] + 1;
    		}
    	}
    	//从后往前遍历，当前位置比后一个位置大并且，candis小于等于后一个位置candis 等于后一个candis+1
    	for ($i=$n-2; $i >=0 ; $i--) { 
    		if($ratings[$i]>$ratings[$i+1]&&$candies[$i]<=$candies[$i+1]){
    			$candies[$i] = $candies[$i+1] + 1;
    		}
    	}    	
    	$sum = 0;
    	for ($i=0; $i < $n; $i++) { 
    		$sum += $candies[$i];
    	}
    	return $sum;
    }
}

$obj = new Solution();
$ratings = [1,2,2];
echo $obj->candy($ratings);