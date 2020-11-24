<?php
/**
 * 每日温度
 * 根据每日 气温 列表，请重新生成一个列表，对应位置的输入是你需要再等待多久温度才会升高的天数。如果之后都不会升高，请输入 0 来代替。

例如，给定一个列表 temperatures = [73, 74, 75, 71, 69, 72, 76, 73]，你的输出应该是 [1, 1, 4, 2, 1, 1, 0, 0]。

提示：气温 列表长度的范围是 [1, 30000]。每个气温的值的都是 [30, 100] 范围内的整数。
 */
class Solution{
	function dailyTemperatures($T){
		$len = count($T);
		$stack = [];
		$res = array_fill(0,$len,0);
		//$res = [];
		for ($i=0; $i <$len ; $i++) { 
			while ($stack && $T[$i]>$T[end($stack)]) {
				$t = array_pop($stack);
				$res[$t] = $i-$t;
			}
			
			array_push($stack,$i);
		}
		return $res;
	}
}

$obj = new Solution();
echo "<pre>";
$nums = [73, 74, 75, 71, 69, 72, 76, 73];

print_r($obj->dailyTemperatures($nums));