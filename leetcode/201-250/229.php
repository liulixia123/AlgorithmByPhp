<?php
/**
 * 求众数II
 * 给你一个数组，找出其中所有出现次数超过N/3的元素
 * 输入[3,2,3]
 * 输出[3]
 * 输入[1]
 * 输出[1]
 * 输入[1,1,1,2,2,3,3,3]
 * 输出[1,3]
 */
class Solution{
	/**
	 * 求N/3 结果最多不用超过2次，最多答案是2个数满足
	 * @param  [type] $nums [description]
	 * @return [type]       [description]
	 */
	public function majorityElement($nums){
		$len = count($nums);
		if($len==0)return [];
		$ans = [];
		$cand1 = $cand2 = 0;
		$hp1 = $hp2 = 0;		
		foreach($nums as $num){
			if($num==$cand1){
				$hp1++;
			}elseif($num==$cand2){
				$hp2++;
			}else{
				if(!$hp1){
					$cand1 = $num;
					$hp1 = 1;
				}elseif(!$hp2){
					$cand2 = $num;
					$hp2 = 1;
				}else{
					$hp1--;
					$hp2--;
				}
			}
		}
		$hp1 = $hp2 = 0;
		foreach($nums as $num){
			if($num==$cand1){
				$hp1++;
			}elseif($num==$cand2){
				$hp2++;
			}
		}
		if($hp1>$len/3) array_push($ans,$cand1);
		if($hp2>$len/3) array_push($ans,$cand2);
		return $ans;
	}
}
$s = new Solution();
echo "<pre>";
print_r($s->majorityElement([1]));