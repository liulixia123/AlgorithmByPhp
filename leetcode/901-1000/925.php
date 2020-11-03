<?php
/**
 * 长按键
 * 你的朋友正在使用键盘输入他的名字 name。偶尔，在键入字符 c 时，按键可能会被长按，而字符可能被输入 1 次或多次。

你将会检查键盘输入的字符 typed。如果它对应的可能是你的朋友的名字（其中一些字符可能被长按），那么就返回 True。

示例 1：
输入：name = "alex", typed = "aaleex"
输出：true
解释：'alex' 中的 'a' 和 'e' 被长按。
示例 2：
输入：name = "saeed", typed = "ssaaedd"
输出：false
解释：'e' 一定需要被键入两次，但在 typed 的输出中不是这样。
示例 3：
输入：name = "leelee", typed = "lleeelee"
输出：true
示例 4：
输入：name = "laiden", typed = "laiden"
输出：true
解释：长按名字中的字符并不是必要的。
解题思路：双指针
 */
class Solution {

    /**
     * @param String $name
     * @param String $typed
     * @return Boolean
     */
    function isLongPressedName($name, $typed) {
    	$namelen = strlen($name);
    	$typelen = strlen($typed);
    	if($namelen>$typelen) return false;
    	$i = $j = 0;
    	while($i<$namelen&&$j<$typelen){
    		if($name[$i]!=$typed[$j]) return false;
    		$i++;
    		$j++;
    		if($name[$i]!==$name[$i-1]){
    			while ($j < $typelen && $typed[$j] === $typed[$j - 1]) {
    				$j++;
    			}
    		}
    	}
    	return $i===$namelen&&$j===$typelen;
    }
}
