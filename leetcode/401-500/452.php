<?php
/**
 * 用最少的箭引爆气球
 * 在二维空间中有许多球形的气球。对于每个气球，提供的输入是水平方向上，气球直径的开始和结束坐标。由于它是水平的，所以纵坐标并不重要，因此只要知道开始和结束的横坐标就足够了。开始坐标总是小于结束坐标。

一支弓箭可以沿着 x 轴从不同点完全垂直地射出。在坐标 x 处射出一支箭，若有一个气球的直径的开始和结束坐标为 xstart，xend， 且满足  xstart ≤ x ≤ xend，则该气球会被引爆。可以射出的弓箭的数量没有限制。 弓箭一旦被射出之后，可以无限地前进。我们想找到使得所有气球全部被引爆，所需的弓箭的最小数量。

给你一个数组 points ，其中 points [i] = [xstart,xend] ，返回引爆所有气球所必须射出的最小弓箭数。
示例 1：
输入：points = [[10,16],[2,8],[1,6],[7,12]]
输出：2
解释：对于该样例，x = 6 可以射爆 [2,8],[1,6] 两个气球，以及 x = 11 射爆另外两个气球
示例 2：
输入：points = [[1,2],[3,4],[5,6],[7,8]]
输出：4
示例 3：
输入：points = [[1,2],[2,3],[3,4],[4,5]]
输出：2
示例 4：
输入：points = [[1,2]]
输出：1
示例 5：
输入：points = [[2,3],[2,3]]
输出：1

 */
class Solution {

    /**
     * @param Integer[][] $points
     * @return Integer
     */
    function findMinArrowShots($points) {
    	//边界条件判断
        if (empty($points)|| count($points) == 0)
            return 0;
        $n = count($points);
        //按照每个气球的左边界排序
        usort($points, function($value1,$value2){
            if( $value1[0] > $value2[0] ){
                return 1;
            }else if( $value1[0] < $value2[0] ){
                return -1;
            }else{
                if( $value1[1] > $value2[1] ){
                    return 1;
                }else if($value1[1] < $value2[1]){
                    return -1;
                }else{
                    return 0;
                }
            }
        });
        
        //获取排序后最后一个气球左边界的位置，我们可以认为是箭射入的位置
        $last = $points[$n - 1][0];
        //统计箭的数量
        $count = 1;
        for ($i = $n - 1; $i >= 0; $i--) {
            //如果箭射入的位置大于下标为i这个气球的右边位置，说明这支箭不能
            //击爆下标为i的这个气球，需要再拿出一支箭，并且要更新这支箭射入的
            //位置
            if ($last > $points[$i][1]) {
                $last = $points[$i][0];
                $count++;
            }
        }
        return $count;
    }
}
$s = new Solution();
echo "<pre>";
print_r($s->findMinArrowShots([[10,16],[2,8],[1,6],[7,12]]));