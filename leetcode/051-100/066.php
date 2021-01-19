<?php
/**题目
加一
给定一个由整数组成的非空数组所表示的非负整数，在该数的基础上加一。

最高位数字存放在数组的首位， 数组中每个元素只存储一个数字。

你可以假设除了整数 0 之外，这个整数不会以零开头
输入: [1,2,3]
输出: [1,2,4]
解释: 输入数组表示数字 123。
输入: [4,3,2,1]
输出: [4,3,2,2]
解释: 输入数组表示数字 4321。
//为了更好理解题意，根据 LeetCode 评论区评论新增一个示例
输入: [9,9]
输出: [1，0，0]
解释: 输入数组表示数字 100。
就是个位数小于9直接加1返回
个位数等于9加一变0,十位数上加1判断是否小于9，直接加1 返回，以此类推
*/

class Solution{
	public function plusOne($digits){
		$len = count($digits);
		for ($i=$len-1; $i >=0; $i--) { 
			if($digits[$i]<9){
				$digits[$i] = $digits[$i]+1;
				return $digits;
			}
			$digits[$i] = 0;
		}
		$res[0] =1;
		for ($i=1; $i <= $len; $i++) { 
			$res[$i] = 0;
		}
		return $res;
	}
}
$s = new Solution();
echo "<pre>";
print_r($s->plusOne([1,2,3]));