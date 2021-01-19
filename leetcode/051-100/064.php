<?php
//最小路径和
/*一个机器人位于一个 m x n 网格的左上角 （起始点在下图中标记为“Start” ）。

机器人每次只能向下或者向右移动一步。机器人试图达到网格的右下角（在下图中标记为“Finish”）。

请找出一条从左上角到右下角的路径，使得路径上的数字总和为最小。
输入:
[
  [1,3,1],
  [1,5,1],
  [4,2,1]
]
输出: 7
解释: 因为路径 1→3→1→1→1 的总和最小。
*/
//动态规划求解
class Solution {
    
    function minPathSum($grid) {
        if(empty($grid)) return 0;
        $m = count($grid);
        $n = count($grid[0]);
        $dp = [];
        $dp[0][0] = $grid[0][0];
        for ($i=1; $i < $m; $i++) { 
            $dp[$i][0] = $dp[$i - 1][0] + $grid[$i][0];
        }
         for ($j=1; $j < $n; $j++) { 
            $dp[0][$j] = $dp[0][$j-1] + $grid[0][$j];
        }
        for ($i=1; $i < $m; $i++) { 
            for ($j=1; $j < $n; $j++) { 
                $dp[$i][$j] = min($dp[$i-1][$j],$dp[$i][$j-1])+$grid[$i][$j];
            }
        }
        return $dp[$m-1][$n-1];
    }
    //空间压缩的动态规划
    function minPathSum1($grid) {
        if(empty($grid)) return 0;
        $m = count($grid);
        $n = count($grid[0]);
        $dp = [];
        $dp[0] = $grid[0][0];
        for ($i=1; $i < $n; $i++) { 
            $dp[$i] = $dp[$i - 1] + $grid[0][$i];
        } 
        for ($i=1; $i < $m; $i++) {        
          for ($j=0; $j < $n; $j++) {
              $tem = ($j>0)?$dp[$j-1]:PHP_INT_MAX;
              $dp[$j] = min($tem,$dp[$j])+$grid[$i][$j];             
          }
        }       
        return $dp[$n-1];
    }
}

$s = new Solution();
echo "<pre>";
print_r($s->minPathSum1([
  [1,3,1],
  [1,5,1],
  [4,2,1]
]));