<?php
//求x的平方根
//二分来求解
class Solution {

    /**
     * @param Integer $x
     * @return Integer
     */
    function mySqrt($x) {
        if ($x <= 1) return $x;
        $l = 1;
        $r = floor($x / 2) + 1;
        while ($l < $r) {
            // 取右中位数，否则会死循环
            $mid = $l + floor(($r - $l + 1) / 2);
            if ($mid == $x / $mid) return $mid;
            if ($mid < $x / $mid) {
                $l = $mid;
            } else {
                $r = $mid - 1;
            }
        }

        return $l;
    }
}
$s = new Solution();
echo "<pre>";
print_r($s->mySqrt(8));