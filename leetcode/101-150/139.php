<?php
/**
 * 单词拆分
 * 给定一个非空字符串 s 和一个包含非空单词的列表 wordDict，判定 s 是否可以被空格拆分为一个或多个在字典中出现的单词。
说明：
拆分时可以重复使用字典中的单词。
你可以假设字典中没有重复的单词。
示例 1：
输入: s = "leetcode", wordDict = ["leet", "code"]
输出: true
解释: 返回 true 因为 "leetcode" 可以被拆分成 "leet code"。
示例 2：
输入: s = "applepenapple", wordDict = ["apple", "pen"]
输出: true
解释: 返回 true 因为 "applepenapple" 可以被拆分成 "apple pen apple"。
     注意你可以重复使用字典中的单词。
示例 3：
输入: s = "catsandog", wordDict = ["cats", "dog", "sand", "and", "cat"]
输出: false

 */
class Solution {

    /**
     * @param String $s
     * @param String[] $wordDict
     * @return Boolean
     */
    function wordBreak($s, $wordDict) {
    	$len = strlen($s);
        // dp 数组，表示 [0,i] 这段字符串是否可以拆分
        $dp = array_fill(0, $len + 1, false);
        // 空字符串，base case
        $dp[0] = true;
        for ($i = 1; $i <= $len; ++$i) {
            for ($j = $i - 1; $j >= 0; --$j) {
                $word = substr($s, $j, $i - $j);
                // 状态转移方程
                if ($dp[$j] && in_array($word, $wordDict)) {
                    $dp[$i] = true;
                    break;
                }
            }
        }

        return end($dp);
    }
}