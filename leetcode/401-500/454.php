<?php
/**
 * 四数相加II
 * 给定四个包含整数的数组列表 A , B , C , D ,计算有多少个元组 (i, j, k, l) ，使得 A[i] + B[j] + C[k] + D[l] = 0。

为了使问题简单化，所有的 A, B, C, D 具有相同的长度 N，且 0 ≤ N ≤ 500 。所有整数的范围在 -228 到 228 - 1 之间，最终结果不会超过 231 - 1 。

例如:
输入:
A = [ 1, 2]
B = [-2,-1]
C = [-1, 2]
D = [ 0, 2]

输出:2

解释:
两个元组如下:
1. (0, 0, 0, 1) -> A[0] + B[0] + C[0] + D[1] = 1 + (-2) + (-1) + 2 = 0
2. (1, 1, 0, 0) -> A[1] + B[1] + C[0] + D[0] = 2 + (-1) + (-1) + 0 = 0
前缀和
首先求出 A 和 B 任意两数之和 sumAB，以 sumAB 为 key，sumAB 出现的次数为 value，存入 hashmap 中。

然后计算 C 和 D 中任意两数之和的相反数 sumCD，在 hashmap 中查找是否存在 key 为 sumCD。

算法时间复杂度为 O (n2)。

 */
class Solution {

    /**
     * @param Integer[] $A
     * @param Integer[] $B
     * @param Integer[] $C
     * @param Integer[] $D
     * @return Integer
     */
    function fourSumCount($A, $B, $C, $D) {
        $aLen = count($A);
        $bLen = count($B);
        $hash = [];
        for ($i = 0; $i < $aLen; ++$i) {
            for ($j = 0; $j < $bLen; ++$j) {
                $sumAB = $A[$i] + $B[$j];
                if (!isset($hash[$sumAB])) {
                    $hash[$sumAB] = 1;
                } else {
                    $hash[$sumAB]++;
                }
            }
        }

        $ans = 0;
        $cLen = count($C);
        $dLen = count($D);
        for ($i = 0; $i < $cLen; ++$i) {
            for ($j = 0; $j < $dLen; ++$j) {
                $sumCD = $C[$i] + $D[$j];
                if (isset($hash[-$sumCD])) $ans += $hash[-$sumCD];
            }
        }
        return $ans;
    }
}