<?php
/**
 * 按要求补齐数组  困难
 * 给定一个已排序的正整数数组 nums，和一个正整数 n 。从 [1, n] 区间内选取任意个数字补充到 nums 中，使得 [1, n] 区间内的任何数字都可以用 nums 中某几个数字的和来表示。请输出满足上述要求的最少需要补充的数字个数。

示例 1:

输入: nums = [1,3], n = 6
输出: 1 
解释:
根据 nums 里现有的组合 [1], [3], [1,3]，可以得出 1, 3, 4。
现在如果我们将 2 添加到 nums 中， 组合变为: [1], [2], [3], [1,3], [2,3], [1,2,3]。
其和可以表示数字 1, 2, 3, 4, 5, 6，能够覆盖 [1, 6] 区间里所有的数。
所以我们最少需要添加一个数字。
示例 2:

输入: nums = [1,5,10], n = 20
输出: 2
解释: 我们需要添加 [2, 4]。
示例 3:

输入: nums = [1,2,2], n = 5
输出: 0

贪心算法
我们从左往右遍历数组，并且维护一个到当前为止最大可以到达的值。如果当前数组的值比这个最大值大，就说明我们无法合成这个值，需要补贴一个数，然后加上补贴的这个数更新为新的最大可能到达的值。以题目中的测试用例2（nums = [1, 5, 10], n = 20）为例来说明具体过程：

1）初始状态：能够cover的是小于1的数，因此第一个遇到1，正好可以cover下一个数，不需要补贴，这样我们可以更新最大可以cover的值为1*2 = 2以内的数（不包含2）。

2）第二个数是5，而我们现在能够cover的是小于1的数，因此需要补贴一个2，此时更新cover的值为2*2 = 4，即我们可以cover4以内的数（不包含4）；然后我们发现依然不能到达5，所以需要在补贴一个4，之后可以到达的数就是8之内的数了（不包含8）；再看数组5，因为5已经在可以cover的范围之内了，而多了5好之后，可以cover的最大值就变成了8 + 5 = 13之内的数了（不包含13）；此时可以再遍历下一个数了。

3）下一个数组值为10，依然在我们可以cover的范围之内，因此不需要补贴，但是cover的值却可以更新到13 + 10 = 23 > 20，因此就可以返回了。
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $n
     * @return Integer
     */
    function minPatches($nums, $n) {
        $patches = 0;
        $x       = 1;
        $len     = count($nums);
        $index   = 0;
        while ($x <= $n) {
            if ($index < $len && $nums[$index] <= $x) {
                $x += $nums[$index];
                $index++;
            } else {
                $x *= 2;
                $patches++;
            }
        }
        return $patches;
    }
}