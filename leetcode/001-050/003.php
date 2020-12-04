<?php
/**题目
最长无重复字串
Given a string, find the length of the longest substring without repeating characters.
Example 1:
Input: "abcabcbb"
Output: 3
Explanation: The answer is "abc", with the length of 3.
Example 2:
Input: "bbbbb"
Output: 1
Explanation: The answer is "b", with the length of 1.
Example 3:
Input: "pwwkew"
Output: 3
Explanation: The answer is "wke", with the length of 3.
 Note that the answer must be a substring, "pwke" is a subsequence
and not a substring.
意思就是在一个字符串重寻找没有重复字符的最长子串。
解题思路这一题和第 438 题，第 3 题，第 76 题，第 567 题类似，实现思想都是"滑动窗口"。
滑动窗口的右边界不断的右移，只要没有重复的字符，就持续向右扩大窗口边界。一旦出现了重复字
符，就需要缩小左边界，直到重复的字符移出了左边界，然后继续移动滑动窗口的右边界。以此类推，
每次移动需要计算当前长度，并判断是否需要更新最大长度度，最终最大的值就是题目中的所求。
*/

class Solution{
	public function lengthOfLongestSubstring($s){
		$len = strlen($s);
		if($len<=0){
			return 0;
		}
		$maxlenth = 0;//最长字串的长度
		$st = 0;//最左边字符位置
		$charMap = [];//记录字符最后出现的位置
		for ($i=0; $i < $len; $i++) { 
			if(!array_key_exists($s[$i],$charMap)||$charMap[$s[$i]]<$st){
				$maxlenth = max($maxlenth,$i-$st+1);
			}else{
				$st = $charMap[$s[$i]]+1;
			}
			$charMap[$s[$i]] = $i;
		}		
		return $maxlenth;

	}
	/**
	 * 动态规划求解
	 * @param  [type] $s [description]
	 * @return [type]    [description]
	 */
	function lengthOfLongestSubstring1($s){
		$len = strlen($s);
		if($len<=0){
			return 0;
		}
		$maxlenth = 1;//最长字串的长度		
		$charMap = [];//记录字符最后出现的位置
		$dp = [];
		$dp[0] = 1;
		$charMap[$s[0]] = 0;
		for ($i=1; $i < $len; $i++) { 			
			if(array_key_exists($s[$i],$charMap)){
				$index = $i-$charMap[$s[$i]];
				$dp[$i] = $index>$dp[$i-1]?$dp[$i-1]+1:$index;				
			}else{
				$dp[$i] = $dp[$i-1]+1;
			}
			$charMap[$s[$i]] = $i;
			$maxlenth =max($maxlenth,$dp[$i]);		
		}
		return $maxlenth;
	}
	/**
	 * 简化动态规划
	 * @param  [type] $s [description]
	 * @return [type]    [description]
	 */
	function lengthOfLongestSubstring2($s){
		$len = strlen($s);
		if($len<=0){
			return 0;
		}
		$maxlenth = 1;//最长字串的长度		
		$charMap = [];//记录字符最后出现的位置		
		$charMap[$s[0]] = 0;
		$prelen = 1;
		for ($i=1; $i < $len; $i++) { 			
			if(array_key_exists($s[$i],$charMap)){				
				$prelen = min($prelen+1,$i-$charMap[$s[$i]]);				
			}else{
				$prelen = $prelen+1;
			}
			$charMap[$s[$i]] = $i;
			$maxlenth =max($maxlenth,$prelen);		
		}
		return $maxlenth;
	}
}
$s = new Solution();
print_r($s->lengthOfLongestSubstring1("pwwkew"));