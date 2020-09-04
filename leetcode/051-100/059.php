<?php
/**题目
给定一个正整数 n，生成n个包含 1 到 n^2 所有元素，且元素按顺时针顺序螺旋排列的正方形矩阵。
Input: 3
Output:
[
 [ 1, 2, 3 ],
 [ 8, 9, 4 ],
 [ 7, 6, 5 ]
]
这题是第 54 题的加强版，没有需要注意的特殊情况，直接模拟即可。
*/

class Solution{
	public function generateMatrix($n){
		if($n == 0) return [[]];
		if($n == 1) return [[1]];
		$rowstart = 0;
		$rowend = $n-1;
		$columnstart = 0;
		$columnend  = $n-1;
		$res = [];
		$current = 0;
		$temp = [];
		while ($rowstart<= $rowend &&$columnstart<=$columnend) {
			for ($i=$columnstart; $i <=$columnend; $i++) { 
				$current++;
				$res[$rowstart][$i] = $current;
			}			
			$rowstart++;
			for ($j=$rowstart; $j <=$rowend; $j++) { 
				$current++;
				$res[$j][$columnend] = $current;
			}			
			$columnend--;
			for ($i=$columnend; $i >=$columnstart; $i--) { 
				if($rowend>=$rowstart){
					$current++;
					$res[$rowend][$i] = $current;
				}
				
			}			
			$rowend--;
			for ($j=$rowend; $j >=$rowstart; $j--) {
				if($columnend>=$columnstart){
					$current++;
					$res[$j][$columnstart] = $current;
				}				
			}			
			$columnstart++;

		}
		return $res;
	}
}
$s = new Solution();
echo "<pre>";
print_r($s->generateMatrix(3));