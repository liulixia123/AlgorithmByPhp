<?php
/**题目
给出一个区间的集合，请合并所有重叠的区间。
示例 1:

输入: [[1,3],[2,6],[8,10],[15,18]]
输出: [[1,6],[8,10],[15,18]]
解释: 区间 [1,3] 和 [2,6] 重叠, 将它们合并为 [1,6].
示例 2:

输入: [[1,4],[4,5]]
输出: [[1,5]]
解释: 区间 [1,4] 和 [4,5] 可被视为重叠区间。
解题思路

*/

class Solution{
	public function merge56($intervals){
		$length = count($intervals);
		if($length == 0) return $intervals;
		$res = [];
		sort($intervals);
		$temp = $intervals[0];
		for ($i=1; $i < $length; $i++) { 
			if($temp[1]>=$intervals[$i][0]){
				$temp[1] = max($temp[1],$intervals[$i][1]);
				$temp[0] = min($temp[0],$intervals[$i][0]);
			}else{
				array_push($res,$temp);
				$temp = $intervals[$i];
			}
		}
		array_push($res,$temp);
		return $res;
	}
}
$s = new Solution();
echo "<pre>";
print_r($s->merge56([[1,4],[0,0]]));