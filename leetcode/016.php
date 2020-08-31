<?php
/**题目
给定一个包括 n 个整数的数组 nums 和 一个目标值 target。找出 nums 中的三个整数，使得它们的和与 target 最接近。返回这三个数的和。假定每组输入只存在唯一答案。

例如，给定数组 nums = [-1，2，1，-4], 和 target = 1.

与 target 最接近的三个数的和为 2. (-1 + 2 + 1 = 2).
解题思路
我们可以先对数组进行排序，如果是计算两个元素的和的话，我们会分别设置头和尾两个指针，向中间靠拢，
那么三个的话，我们只需要先对第一个数进行循环取值下标i，剩下的两个指针分别指向i+1和数组的最后一个元素，
这样的复杂度是 排序O(nlogn) + 查找O(n^2) = O(n^2)。
*/

class Solution{
	public function threeSumClosest($nums,$target){
		$length = count($nums);
		if($length<3){
			return 0;
		}
		sort($nums);
		$res = 0;
		$flag=0;
		for ($i=0; $i < $length-2; $i++) { 
			$j=$i+1;
			$k = $length-1;
			while ($j<$k) {
				$sum = $nums[$i]+$nums[$j]+$nums[$k];
				if ($flag==0){
                    $flag=1;
                    $res= $sum;
                }
                if (abs($sum-$target)<abs($res-$target)){
                    $res=$sum;
                }
                if ($sum==$target){
                    return $res; #没有最小的
                }elseif($sum<$target){
                    $j+=1;
                }else{
                    $k-=1;
                }
			}
			
			
		}
		return $res;

	}
}
$s = new Solution();
echo "<pre>";
var_dump($s->threeSumClosest([-1,2,1,-4],$target=1));