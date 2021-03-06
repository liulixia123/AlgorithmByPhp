<?php
/**题目
只出现一次的数字
给定一个非空整数数组，除了某个元素只出现一次以外，其余每个元素均出现两次。找出那个只出现了一次的元素。

说明：

你的算法应该具有线性时间复杂度。 你可以不使用额外空间来实现吗？
输入: [2,2,1]
输出: 1
输入: [4,1,2,1,2]
输出: 4
所有元素做异或最后结果就是只出现一次
*/

class Solution{
	public function singleNumber($nums){
		$len = count($nums);
		$res = $nums[0];
		for ($i=1; $i < $len; $i++) { 
			$res ^= $nums[$i];
		}
		
		return $res;
	}
}
$s = new Solution();
echo "<pre>";
print_r($s->singleNumber([9,1,9,2,1]));