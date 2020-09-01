<?php
/**题目
Given an array nums of n integers and an integer target, are there elements a, b, c, and d in nums
such that a + b + c + d = target? Find all unique quadruplets in the array which gives the sum of
target.
Note:
The solution set must not contain duplicate quadruplets.
Given array nums = [1, 0, -1, 0, -2, 2], and target = 0.
A solution set is:
[
 [-1, 0, 0, 1],
 [-2, -1, 1, 2],
 [-2, 0, 0, 2]
]

给定一个数组，要求在这个数组中找出 4 个数之和为 0 的所有组合。
解题思路
⽤ map 提前计算好任意 3 个数字之和，保存起来，可以将时间复杂度降到 O(n^3)。这⼀题⽐较麻烦的
⼀点在于，最后输出解的时候，要求输出不重复的解。数组中同⼀个数字可能出现多次，同⼀个数字也
可能使⽤多次，但是最后输出解的时候，不能重复。例如 [-1，1，2, -2] 和 [2, -1, -2, 1]、[-2, 2, -1, 1] 这
3 个解是重复的，即使 -1, -2 可能出现 100 次，每次使⽤的 -1, -2 的数组下标都是不同的。
这⼀题是第 15 题的升级版，思路都是完全⼀致的。这⾥就需要去重和排序了。map 记录每个数字出现
的次数，然后对 map 的 key 数组进⾏排序，最后在这个排序以后的数组⾥⾯扫，找到另外 3 个数字能
和⾃⼰组成 0 的组合。
*/

class Solution{
	public function fourSum($nums,$target){
		$length = count($nums);
		if($length<4){
			return 0;
		}
		sort($nums);
		$flag=0;
		$res = $temp = [];
		//四个指针
		for ($i=0; $i < $length-3; $i++) { 
			$j=$i+1;//i+1左
			$m = $j+1;//i+2
			$k = $length-1;//右
			while ($j<$k-1) {
				while ($m<$k) {
					$sum = $nums[$i]+$nums[$j]+$nums[$m]+$nums[$k];
					if($sum == $target){
						$res[] = [$nums[$i],$nums[$j],$nums[$m],$nums[$k]];
						while($m<$k && $nums[$m]==$nums[$m+1]) $m++;
                        while($m<$k && $nums[$k]==$nums[$k-1]) $k--;
                        $m++;
                        $k--;
					}elseif($sum<$target){
						$m++;
					}else{
						$k--;
					}
				}
				while($j<$k-1 && $nums[$j]==$nums[$j+1]) $j++;
                $j++;
                $m=$j+1;
                $k=$length-1;
			}
			
			
		}
		return $res;

	}
}
$s = new Solution();
echo "<pre>";
var_dump($s->fourSum([1, 0, -1, 0, -2, 2],$target=0));