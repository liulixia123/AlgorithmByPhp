<?php
/**
 * 只出现一次的数字III 中等难度
 给定一个整数数组 nums，其中恰好有两个元素只出现一次，其余所有元素均出现两次。 找出只出现一次的那两个元素。

示例 :

输入: 
[1,2,1,3,2,5]

输出: 
[3,5]
注意：

结果输出的顺序并不重要，对于上面的例子， [5, 3] 也是正确答案。
你的算法应该具有线性时间复杂度。你能否仅使用常数空间复杂度来实现？
 */
class Solution{
	public function singleNumber($nums){
		$len = count($nums);
		$sum = $nums[0];	
		$res = [];	
		//只出现一次的两个数a和b 异或结果为a^b a不等于b，说明a和b中某个位置一个为1相同位另一个为0
		for ($i=1; $i < $len; $i++) { 
			$sum ^= $nums[$i];
			
		}
		//异或运算后将数组分成两组，相同位为1为一组相同位为0为一组
		$flag = $sum&(~($sum-1));//取最低位的1
		for ($i=0; $i < $len; $i++) { 
			if(($nums[$i]&$flag)==0) {
				$res[0]^=$nums[$i];
			}else{
				$res[1]^=$nums[$i];
			}
			
		}		
		return $res;
	}
}
$s = new Solution();
echo "<pre>";
print_r($s->singleNumber([1,2,1,3,2,5]));