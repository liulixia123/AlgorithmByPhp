<?php
/**题目
跳跃游戏
给定一个数组从第一个元素能否跳到最后一个元素位置
示例1
输入: [2,3,1,1,4]
输出: true
解释: 我们可以先跳 1 步，从位置 0 到达 位置 1, 然后再从位置 1 跳 3 步到达最后一个位置。

示例 2:

输入: [3,2,1,0,4]
输出: false
解释: 无论怎样，你总会到达索引为 3 的位置。但该位置的最大跳跃长度是 0 ， 所以你永远不可能到达最后一个位置。

解题思路
从后往前遍历，如果当前元素不是0，必然可以到达下一步，否则为0，就看这个元素前面的元素是否可以跳过这个0(可以理解为抹平0，0就是一个坑，跳过去了就success, 否则就掉坑fail).

*/

class Solution{
	public function canJump($nums){
		$length = count($nums);
		if($length == 0) return false;
		$step = 1;
		for ($i=$length-2; $i>=0 ; $i--) { 

			if($nums[$i]>=$step) {
				$step=1;
			}else{				
				++$step;				
			}
		}		
		return $step===1;
	}
}
$s = new Solution();
echo "<pre>";
var_dump($s->canJump([3,2,1,0,4]));