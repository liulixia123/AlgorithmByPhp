<?php
/**
 * 岛屿数量
 * 深度优先DFS
 */
class Solution {
	function numIslands($grid){
		if(empty($grid)) return 0;
		$row = count($grid);
		$column = count($grid[0]);
		$count = 0;
		for ($i=0; $i < $row; $i++) { 
			for ($j=0; $j < $column; $j++) { 
				if($grid[$i][$j]==1){
					$count++;					
					$this->combine($grid,$i,$j);
				}
			}
		}		
		return $count;
	}
	function combine(&$grid,$i,$j){
		$grid[$i][$j] = 0;
		if($i>count($grid)-1&&$j>count($grid[0])-1) return ;
		if($i>0&&$grid[$i-1][$j]==1){
			$this->combine($grid,$i-1,$j);
		}
		if($i<count($grid)-1&&$grid[$i+1][$j]==1){
			$this->combine($grid,$i+1,$j);
		}
		if($j>0&&$grid[$i][$j-1]==1){
			$this->combine($grid,$i,$j-1);
		}
		if($j<count($grid[0])-1&&$grid[$i][$j+1]==1){
			$this->combine($grid,$i,$j+1);
		}
	}
}

$s = new Solution();
$grid = [
	[1,1,1,1,0],
	[1,1,0,1,0],
	[1,1,0,0,0],
	[0,0,0,0,0],
];
var_dump($s->numIslands($grid));