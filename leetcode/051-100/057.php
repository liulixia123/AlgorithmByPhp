<?php
/**题目
这⼀题是第 56 题的加强版。给出多个没有重叠的区间，然后再给一个区间，要求把如果有重叠的区间
进行合并。
示例 1:
Input: intervals = [[1,3],[6,9]], newInterval = [2,5]
Output: [[1,5],[6,9]]
示例 2:
Input: intervals = [[1,2],[3,5],[6,7],[8,10],[12,16]], newInterval = [4,8]
Output: [[1,2],[3,10],[12,16]]
Explanation: Because the new interval [4,8] overlaps with [3,5],[6,7],[8,10].
解题思路

*/

class Solution{
	public function insert($intervals,$newInterval){
		$length = count($intervals);
		if($length == 0) return array_push($intervals,$newInterval);
		$res = [];
		$curIndex = 0;
		while ( $curIndex< $length && $intervals[$curIndex][1]<=$newInterval[0]) {			
			array_push($res,$intervals[$curIndex]);
			$curIndex++;
		}
		while ($curIndex< $length&& $intervals[$curIndex][0]<=$newInterval[1]) {
			$newInterval = [min($newInterval[0],$intervals[$curIndex][0]),max($newInterval[1],$intervals[$curIndex][1])];
			$curIndex++;
		}
		array_push($res,$newInterval);
		while ( $curIndex<$length) {
			array_push($res,$intervals[$curIndex]);
			$curIndex++;
		}
		return $res;
	}
}
$s = new Solution();
echo "<pre>";
print_r($s->insert([[1,2],[3,5],[6,7],[8,10],[12,16]],[4,8]));