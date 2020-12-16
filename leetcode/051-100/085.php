<?php
/**
 * 最大矩形  困难
 * 给定一个仅包含 0 和 1 、大小为 rows x cols 的二维二进制矩阵，找出只包含 1 的最大矩形，并返回其面积。
 * 输入：matrix = [["1","0","1","0","0"],["1","0","1","1","1"],["1","1","1","1","1"],["1","0","0","1","0"]]
输出：6
解释：最大矩形如上图所示。
示例 2：

输入：matrix = []
输出：0
示例 3：

输入：matrix = [["0"]]
输出：0
示例 4：

输入：matrix = [["1"]]
输出：1
示例 5：

输入：matrix = [["0","0"]]
输出：0

单调栈求解
 */
class Solution {

    /**
     * @param String[][] $matrix
     * @return Integer
     */
    function maximalRectangle($matrix) {
    	$height = [];
    	if(empty($matrix)) return 0;
    	if($matrix[0][0]=="0"&&count($matrix)==1) return 0;
    	$m = count($matrix);
    	$n = count($matrix[0]);
    	$maxArea = 0;
    	for ($i=0; $i < $m; $i++) {// 计算以每一行为底高度是多少 
    		for ($j=0; $j < $n; $j++) { 
    			if($matrix[$i][$j]=='1'){
    				$height[$j] +=1;
    			}else{
    				$height[$j] =0;
    			}
    			
    		}    		
    		$maxArea = max($maxArea,$this->maxArea($height));
    	}    	
    	return $maxArea;
    }
    function maxArea($nums){
		$n = count($nums);
		$stack = [];
		array_push($stack,-1);
		$max = 0;
		for ($i=0; $i < $n; $i++) { 
			while($nums[$i]<$nums[end($stack)]){
				$k = array_pop($stack);
				$max = max($max,$nums[$k]*($i-end($stack)-1));
			}
			
			array_push($stack,$i);
		}
		while (!empty($stack)) {
			// 栈顶高度
			$height = $nums[array_pop($stack)];
			//左边第一个小于当前高度的下标
			$left = end($stack);
			//右边大于当前高度的下标，等于数组的长度
			$right = $n;
			$max = max($max,$height*($right-$left-1));
		}
		
		return $max;
	}
}
$obj = new Solution();
$maxArea = $obj->maximalRectangle([["1","0","1","0","0"],["1","0","1","1","1"],["1","1","1","1","1"],["1","0","0","1","0"]]);
echo $maxArea;