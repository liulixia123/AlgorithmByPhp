<?php
/**
 * 翻转矩阵后的得分
 * 有一个二维矩阵 A 其中每个元素的值为 0 或 1 。

移动是指选择任一行或列，并转换该行或列中的每一个值：将所有 0 都更改为 1，将所有 1 都更改为 0。

在做出任意次数的移动后，将该矩阵的每一行都按照二进制数来解释，矩阵的得分就是这些数字的总和。

返回尽可能高的分数。

 

示例：

输入：[[0,0,1,1],[1,0,1,0],[1,1,0,0]]
输出：39
解释：
转换为 [[1,1,1,1],[1,0,0,1],[1,1,1,1]]
0b1111 + 0b1001 + 0b1111 = 15 + 9 + 15 = 39
贪心算法
 */
class Solution {

    /**
     * @param Integer[][] $A
     * @return Integer
     * 第一步：将首列全部置位1，首列不为1的行全部翻转

第二步：从第二列开始，统计1的数量，小于一半就翻转这一列（只为求值，可以不翻转）

第三步：计算结果返回
     */
    function matrixScore($A) {
        $size = count($A);
        $subSize = count($A[0]);
        for($i=0;$i<$size;$i++){
            if($A[$i][0] === 0){
                for($j=0;$j<$subSize;$j++){
                    $A[$i][$j] = $A[$i][$j] ? 0 : 1;
                }
            }
        }

        $num = $size * pow(2,$subSize-1);

        for($i=1;$i<$subSize;$i++){
            $flag = 0;
            for($j=0;$j<$size;$j++){
                if($A[$j][$i] == 1) $flag++;
            }
            if($flag < $size/2){
                // 可以不翻转，直接计算
                // for($j=0;$j<$size;$j++){
                //     $A[$j][$i] = $A[$j][$i] ? 0 : 1;
                // }
                $num += ($size - $flag) * pow(2,$subSize-$i-1);
            }else{
                $num += $flag * pow(2,$subSize-$i-1);
            }
        }

        return $num;
    }
}