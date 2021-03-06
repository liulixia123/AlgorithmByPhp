<?php
/**
 * 距离顺序排列矩阵单元格
 * 给出 R 行 C 列的矩阵，其中的单元格的整数坐标为 (r, c)，满足 0 <= r < R 且 0 <= c < C。

另外，我们在该矩阵中给出了一个坐标为 (r0, c0) 的单元格。

返回矩阵中的所有单元格的坐标，并按到 (r0, c0) 的距离从最小到最大的顺序排，其中，两单元格(r1, c1) 和 (r2, c2) 之间的距离是曼哈顿距离，|r1 - r2| + |c1 - c2|。（你可以按任何满足此条件的顺序返回答案。）
示例 1：

输入：R = 1, C = 2, r0 = 0, c0 = 0
输出：[[0,0],[0,1]]
解释：从 (r0, c0) 到其他单元格的距离为：[0,1]
示例 2：

输入：R = 2, C = 2, r0 = 0, c0 = 1
输出：[[0,1],[0,0],[1,1],[1,0]]
解释：从 (r0, c0) 到其他单元格的距离为：[0,1,1,2]

 */
class Solution {

    /**
     * @param Integer $R
     * @param Integer $C
     * @param Integer $r0
     * @param Integer $c0
     * @return Integer[][]
     */
    function allCellsDistOrder($R, $C, $r0, $c0) {
    	//132ms
        $queue = new \SplPriorityQueue();//优先队列
        for($i = 0;$i < $R;$i++){
            for($j = 0;$j < $C;$j++){
                $queue->insert([$i,$j],-(abs($i - $r0) + abs($j - $c0)));
            }
        }
        $ans = [];
        while(!$queue->isEmpty()){
            $ans[] = $queue->extract();
        }
        return $ans;
    }
}
$s = new Solution();
print_r($s->allCellsDistOrder(1,2,0,0));