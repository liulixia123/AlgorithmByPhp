<?php
/**题目
Given a string containing digits from 2-9 inclusive, return all possible letter combinations that
the number could represent.
A mapping of digit to letters (just like on the telephone buttons) is given below. Note that 1 does
not map to any letters.
Example 1:
Input: "23"
Output: ["ad", "ae", "af", "bd", "be", "bf", "cd", "ce", "cf"].

意思就是给定一个仅包含数字 2-9 的字符串，返回所有它能表示的字母组合。给出数字到字母的映射如下（与电
话按键相同）。注意 1 不对应任何字母。
解题思路DFS 递归深搜即可。
*/

class Solution{
	public function letterCombinations($digits){
		$letterMap = [
			 " ", //0
			 "", //1
			 "abc", //2
			 "def", //3
			 "ghi", //4
			 "jkl", //5
			 "mno", //6
			 "pqrs", //7
			 "tuv", //8
			 "wxyz", //9
		];
		$res = [];//计算结果
		$queue = [];//中间队列
		$length = strlen($digits);
		if($length<=0){
			return $res;
		}
		//首个字符取出加入队列中
		$queue = str_split($letterMap[intval($digits[0])]);
		//剩余数字字符依次取出和前面字符组合,广度优先遍历
		for ($i=1; $i < $length; $i++) { 
			$len = count($queue);
			while($len--){
				$ortherlen = count(str_split($letterMap[intval($digits[$i])]));
				for ($j=0; $j < $ortherlen; $j++) { 
					$temp = $queue[0];
					$temp .= str_split($letterMap[intval($digits[$i])])[$j];					
					array_push($queue,$temp);
					
				}
				array_shift($queue);
			}
		}
		if(!empty($queue)){
			$res = $queue;
		}
		return $res;
	}
}
$s = new Solution();
print_r($s->letterCombinations("23"));
