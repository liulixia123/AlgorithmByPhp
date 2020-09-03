<?php
/**题目
Given a matrix of m x n elements (m rows, n columns), return all elements of the matrix in spiral
order.
Input:
[
 [ 1, 2, 3 ],
 [ 4, 5, 6 ],
 [ 7, 8, 9 ]
]
Output: [1,2,3,6,9,8,7,4,5]
Explanation: [4,-1,2,1] has the largest sum = 6.
意思就是给定一个包含 m x n 个元素的矩阵（m 行, n 列），请按照顺时针螺旋顺序，返回矩阵中的所有元素。
解题思路
给出个二维数组，按照螺旋的方式输出
解法⼀：需要注意的是特殊情况，如二维数组退化成一维或者一列或者一个元素。注意了这些情
况，基本就可以一次通过了。
解法⼆：提前算出一共多少个元素，一圈一圈地遍历矩阵，停止条件就是遍历了所有元素（count
== sum）
*/

class Solution{
	public function spiralOrder($nums){
		$length = count($nums);
		if($length == 0) return [];
		$rowstart = 0;
		$rowend = $length-1;
		$columnstart = 0;
		$columnend  = count($nums[0])-1;
		$res = [];
		while ($rowstart<= $rowend &&$columnstart<=$columnend) {
			for ($i=$columnstart; $i <=$columnend; $i++) { 
				array_push($res,$nums[$rowstart][$i]);
			}
			$rowstart++;
			for ($j=$rowstart; $j <=$rowend; $j++) { 
				array_push($res,$nums[$j][$columnend]);
			}
			$columnend--;
			for ($i=$columnend; $i >=$columnstart; $i--) { 
				if($rowend>=$rowstart){
					array_push($res,$nums[$rowend][$i]);
				}
				
			}
			$rowend--;
			for ($j=$rowend; $j >=$rowstart; $j--) {
				if($columnend>=$columnstart){
					array_push($res,$nums[$j][$columnstart]);
				}
				
			}
			$columnstart++;

		}
		return $res;
	}
}
$s = new Solution();
echo "<pre>";
print_r($s->spiralOrder([
 [ 1, 2, 3 ],
 [ 4, 5, 6 ],
 [ 7, 8, 9 ]
]));