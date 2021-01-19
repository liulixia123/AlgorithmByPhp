<?php
/**
 * 朋友圈 省份数量
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
	//广度优先
	function findCircleNum1($m) {
        $count = 0;
        $vis = array_fill(0,sizeof($m),0);
        $queue = [];
        for ($i = 0;$i< sizeof($m);$i++){
            if($vis[$i] == 0){
                array_push($queue,$i);
                while (!empty($queue)){
                    $s = array_shift($queue);//出队
                    $vis[$s] = 1;
                    for ($j = 0;$j<sizeof($m);$j++){
                        if($m[$s][$j] == 1 && $vis[$j] == 0){
                            array_push($queue,$j);//元素入队-继续搜索
                        }
                    }
                }
                $count++;
            }
        }

        return $count;
    }
}

$obj = new Solution();
$grid =[[1,1,0],[1,1,0],[0,0,1]];
var_dump($obj->findCircleNum($grid));