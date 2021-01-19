<?php
/**
 * 只出现一次的数字II 中等难度
 是136题的加强版
 给定一个数组，数组中只有一个元素出现一次，其他元素出现3次，你能在线性时间复杂度求解吗
 一个数第一次遇到赋值给a第二次遇到赋值给b，第三次遇到就全部消除
 a = a^num
 b = b^num
 b = (b^num)&~a
 a = (a^num)&~b
 */
class Solution{
	public function singleNumber($nums){
		$len = count($nums);
		$one = $two = 0;		
		for ($i=0; $i < $len; $i++) { 
			$one = ($one^$nums[$i])&~$two;
			$two = ($two^$nums[$i])&~$one;
			
		}		
		return $one;
	}
}
$s = new Solution();
echo "<pre>";
print_r($s->singleNumber([9,1,9,2,1,9,1]));