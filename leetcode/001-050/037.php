<?php
/**题目

意思就是编写一个程序，通过已填充的空格来解决数独问题。一个数独的解法需遵循如下规则：
1. 数字 1-9 在每一行只能出现一次。
2. 数字 1-9 在每一列只能出现一次。
3. 数字 1-9 在每一个以粗实线分隔的 3x3 宫内只能出现一次。
空白格用'.' 表示。
解题思路
给出一个数独谜题，要求解出这个数独
解题思路 DFS 暴力回溯枚举。数独要求每横⾏，每竖⾏，每九宫格内， 1-9 的数字不能重复，每
次放下一个数字的时候，在这 3 个地方都需要判断一次。
另外找到一组解以后就不需要再继续回溯了，直接返回即可。
*/

class Solution{
	public function solveSudoku($board){
		$length = count($nums);
		if($length==0){
			return 0;
		}
		$low = 0;
		$high = $length-1;		
		while($low<=$high){
			$mid = $low+(($high-$low)>>1);			
			if($nums[$mid]>=$target){
				$high = $mid-1;
			}else{
				if($mid==$length-1||$nums[$mid+1]>=$target){
					return $mid+1;
				}
				$low = $mid+1;
			}
		}
		return 0;
	}
}
$s = new Solution();
print_r($s->solveSudoku());