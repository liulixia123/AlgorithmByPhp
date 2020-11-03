<?php
//最长有效括号
/*
给定一个只包含 '(' 和 ')' 的字符串，找出最长的包含有效括号的子串的长度。

示例 1:

输入: "(()"
输出: 2
解释: 最长有效括号子串为 "()"
示例 2:

输入: ")()())"
输出: 4
解释: 最长有效括号子串为 "()()"
三种解法
 */
class Solution {

    /**
     * @param String $s
     * @return Integer
     * 动态规划解法
     */
    function longestValidParentheses($s) {
        $n = strlen($s);
        if ($n < 2) return 0;
        $dp = array_fill(0, $n, 0);
        for ($i = 1; $i < $n; ++$i) {
            if ($s[$i] === '(') continue;
            $index = $i - $dp[$i - 1] - 1;
            if ($index >= 0 && $s[$index] === '(') {
                $dp[$i] = $dp[$i - 1] + 2 + $dp[$index - 1] ?? 0;
            }
        }

        return max($dp);
    }
	function longestValidParentheses2($s) {
    	// 1. 双向遍历
        $n = strlen($s);
        if ($n < 2) return 0;
        $max = $leftCount = $rightCount = 0;
        for ($i = 0; $i < $n; ++$i) {
            if ($s[$i] === '(') {
                $leftCount++;
            } else {
                $rightCount++;
            }

            if ($rightCount > $leftCount) {
                $leftCount = $rightCount = 0;
            } elseif ($rightCount == $leftCount) {
                $max = max($max, $rightCount * 2);
            }
        }

        $leftCount = $rightCount = 0;
        for ($i = $n - 1; $i >= 0; --$i) {
            if ($s[$i] === '(') {
                $leftCount++;
            } else {
                $rightCount++;
            }

            if ($leftCount > $rightCount) {
                $leftCount = $rightCount = 0;
            } elseif ($leftCount == $rightCount) {
                $max = max($max, $leftCount * 2);
            }
        }

        return $max;
    }
    /**
     * 辅助栈解法
     * @param  [type] $s [description]
     * @return [type]    [description]
     */
    function longestValidParentheses3($s) {
    	$n = strlen($s);
        if ($n <= 1) return 0;
        $max = 0;
        $stack = new SplStack();
        $stack->push(-1);
        for ($i = 0; $i < $n; ++$i) {
            if ($s[$i] === '(') {
                $stack->push($i);
                continue;
            }

            $stack->pop();
            if ($stack->isEmpty()) {
                $stack->push($i);
            } else {
                $max = max($max, $i - $stack->top());
            }
        }
        return $max;
    }

}

$s = new Solution();
echo "<pre>";
print_r($s->longestValidParentheses2(")()())"));