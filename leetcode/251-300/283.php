<?php
/**
 * 移动零
 * 给定一个数组 nums，编写一个函数将所有 0 移动到数组的末尾，同时保持非零元素的相对顺序。
输入: [0,1,0,3,12]
输出: [1,3,12,0,0]
必须在原数组上操作，不能拷贝额外的数组。
尽量减少操作次数。
*/
class Solution{	
	public function moveZeroes($nums){
		$len = count($nums);
		$k =0;
		for ($i=0; $i < $len; $i++) { 
			if($nums[$i]){
				$nums[$k++] = $nums[$i];
			}
		}
		for (; $k < $len; $k++) { 
			$nums[$k]=0;
		}
		return $nums;
	}
	public function moveZeroes1($nums){
		$len = count($nums);
		$k =0;
		for ($i=0; $i < $len; $i++) { 
			if($nums[$i]){
				if($k!=$i){
					$this->swap($nums[$k++],$nums[$i]);
				}else{
					$k++;
				}
			}
		}
		
		return $nums;
	}
	private function swap(&$a,&$b){
		$a = $a+$b;//3
		$b = $a-$b;//1
		$a = $a-$b;//2
	}
}
$s = new Solution();
echo "<pre>";
var_dump($s->moveZeroes1([0,1,0,3,12]));
