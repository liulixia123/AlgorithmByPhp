<?php
/**
 * 数组中第K个大元素
 */
class Solution{
	//hash思想
	function findKthLargest($nums,$k){
		if(empty($nums)) return 0;
		$len = count($nums);
		$max = $nums[0];
		$min = $nums[0];
		for ($i=0; $i < $len; $i++) { 
			if($nums[$i]>$max) $max = $nums[$i];
			if($nums[$i]<$min) $min = $nums[$i];
		}
		foreach ($nums as $key => $value) {
			$arr[$max-$value]++;
		}
		$sum = 0;
		for ($i=0; $i < count($arr); $i++) { 
			$sum +=$arr[$i];
			if($sum>=$k) return $max-$i;
		}
		return 0;
	}

	function findKthLargest1($nums,$k){
		if(empty($nums)) return 0;
		$len = count($nums);
		$index = $this->partition($nums,0,$len-1);
		
		while ($index!=$k) {
			if($index>$k){			
				$index = $this->partition($nums,0,$index-1);			
			}else{
				$index = $this->partition($nums,$index,$len-1);
			}
		}
		if($index==$k){
			return $nums[$index];
		}
	}

	function partition(&$nums,$begin,$end){
		if($begin>$end) return ;
		$pvoit = $begin + rand(0,$end-$begin+1);
		$i = $begin;$counter = 0;
		while($i<=$end){
			if($nums[$i]<$nums[$pvoit]){
				$tmp = $nums[$i];
				$nums[$i] = $nums[$counter];
				$nums[$counter] = $tmp;
				$counter++;
			}
			$i++;
		}
		$tmp = $nums[$pvoit];
		$nums[$pvoit] = $nums[$counter];
		$nums[$counter] = $tmp;
		return $counter;
	}
}
$obj = new Solution();
echo "<pre>";
var_dump($obj->findKthLargest1([3,2,8,5,6,4],2));