<?php
/**
 * 汉明距离
 * 两个整数之间的汉明距离指的是这两个数字对应二进制位不同的位置的数目。

给出两个整数 x 和 y，计算它们之间的汉明距离。

注意：
0 ≤ x, y < 2^31.

示例:

输入: x = 1, y = 4

输出: 2

解释:
1   (0 0 0 1)
4   (0 1 0 0)
       ↑   ↑


 */
class Solution {

    /**
     * @param Integer $x
     * @param Integer $y
     * @return Integer
     */
    function hammingDistance($x, $y) {
        $n = $x^$y;//异或运算，有多少个1就距离多远
        $count=0;
        while ($n) {
        	$n = $n&($n-1);//消除1来查1的个数有多少
        	$count++;
        }
        return $count;
    }
}
$s = new Solution();
echo "<pre>";
var_dump($s->hammingDistance(1,16));