<?php
/**
 * 朋友圈
 * 和岛屿问题一样
 */

class Solution {
	function findCircleNum($M){
		$len = count($M);
		if($len==0) return 0;
		$row = $len;
		$column = count($M[0]);
		$count = 0;
		for ($i=0; $i < $row; $i++) { 
			for($j=0;$j<$column;$j++){
				if($M[$i][$j]==1){
					$count++;
					$this->find($M,$i,$j);
				}
			}
		}
		return $count;
	}
	function find(&$M,$i,$j){
		$M[$i][$j]=0;
		if($i>count($M)&&$j>count($M[$i])) return ;
		if($i>0&&$M[$i-1][$j]==1){
			$this->find($M,$i-1,$j);
		}
		if($i+1<count($M)&&$M[$i+1][$j]==1){
			$this->find($M,$i+1,$j);
		}
		if($j>0&&$M[$i][$j-1]==1){
			$this->find($M,$i,$j-1);
		}
		if($j+1<count($M[$i])&&$M[$i][$j+1]==1){
			$this->find($M,$i,$j+1);
		}
	}
}

$obj = new Solution();
$grid = [
	[1,1,1,1,0],
	[1,1,0,1,0],
	[1,1,0,0,0],
	[0,0,0,0,0],
];
var_dump($obj->findCircleNum($grid));