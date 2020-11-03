<?php
//两数之和，不能使用+，-计算两个数的和
//用位运算求解，进位问题
/**
 *  a = 5
 *  b = 4
 *  a 0101
 *  b 0100
 *   0+0 = 0
 *   0+1 = 1
 *   1+0 = 1
 *   1+1 = 0 (进位1)
 *   ^ 相当于无进位+法
 *   & 求进位
 *   0101
 *   0100=
 *   0100 显然需要左移1位是进位 <<1
 *   直到无进位求解结束
 */
class Solution {

    /**
     * @param Integer $a
     * @param Integer $b
     * @return Integer
     */
    function getSum($a, $b) {
        while($b!=0){
           //获取进位数
            $temp = ($a&$b)<<1;
            //获取无进位加法
            $a = $a^$b;
            $b = $temp; 
        }
        return $a;

    }

    function getJian($a,$b){
        $b = -$b;
        echo $b;
        while($b!=0){
            $temp = ($a&$b)<<1;
            $a = $a^$b;
            $b = $temp;
        }
        return $a;
    }
}
$s = new Solution();
echo "<pre>";
print_r($s->getJian(4,1));
/*
0001
&
0100
=
0000
<<1
0000

0001
^
0100
=
0101
*/