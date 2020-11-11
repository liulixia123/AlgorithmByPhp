<?php
/**
 * 下一个排列
 * 实现获取下一个排列的函数，算法需要将给定数字序列重新排列成字典序中下一个更大的排列。

如果不存在下一个更大的排列，则将数字重新排列成最小的排列（即升序排列）。

必须原地修改，只允许使用额外常数空间。

以下是一些例子，输入位于左侧列，其相应输出位于右侧列。
1,2,3 → 1,3,2
3,2,1 → 1,2,3
1,1,5 → 1,5,1
难度：中等
意思是从上面的某一行排到下一行，如果已经是最后一行了，则重排成第一行
php逆序
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    public function nextPermutation(&$nums) {
    	$n = count($nums);
    	for ($i=$n-2; $i >=0 ; $i--) { //从倒数第二个开始
    		if($nums[$i+1]>$nums[$i]){//升序排列
    			for($j=$n-1;$j>=0;$j--){//从右向左找到第一个比左侧大的数
    				if($nums[$j]>$nums[$i]) break;
    			}
    			$temp = $nums[$i];
    			$nums[$i] = $nums[$j];
    			$nums[$j] = $temp;
    			$left = $i+1;
    			$right = $n-1;
    			$this->reverse($nums,$left,$right);
    			return $nums;
    		}
    	}
    	
    	$this->reverse($nums,0,$n-1);
    	return $nums;
    }
    function reverse(&$nums, $left, $right) {
	    while($left<$right){
	    	$temp = $nums[$left];
	    	$nums[$left] = $nums[$right];
	    	$nums[$right] = $temp;
	    	$left++;
	    	$right--;
	    }
	}
}

$s = new Solution();
$arr = [1,1,5];
var_dump($s->nextPermutation($arr));