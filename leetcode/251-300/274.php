<?php
/**
 * H 指数
 * 输入[3,0,6,1,5]
 * 输出3
 * 有3篇超过h，有2（n-h）两篇不超过h
 */
class Solution{
	public function hIndex($citations){
		if(count($citations)==0) return 0;
		sort($citations);
		$ans = $citations[0]?1:0;
		$len = count($citations);
		for($i = $len-1;$i>=0;$i--){
			if($citations[$i]>=$len-$i){
				$ans = ($ans > $len - $i)? $ans : $len - $i;
			}
		}
		return $ans;
	}
}
$s = new Solution();
echo "<pre>";
print_r($s->hIndex([3,0,6,1,5]));