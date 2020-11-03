<?php
/**
 * 避免重复字母的最小删除成本
 * 给你一个字符串 s 和一个整数数组 cost ，其中 cost[i] 是从 s 中删除字符 i 的代价。

返回使字符串任意相邻两个字母不相同的最小删除成本。

请注意，删除一个字符后，删除其他字符的成本不会改变。

 

示例 1：

输入：s = "abaac", cost = [1,2,3,4,5]
输出：3
解释：删除字母 "a" 的成本为 3，然后得到 "abac"（字符串中相邻两个字母不相同）。
示例 2：

输入：s = "abc", cost = [1,2,3]
输出：0
解释：无需删除任何字母，因为字符串中不存在相邻两个字母相同的情况。
示例 3：

输入：s = "aabaa", cost = [1,2,3,4,1]
输出：2
解释：删除第一个和最后一个字母，得到字符串 ("aba") 。
思路：
把字符串按照连续相同字符分成互不相交的子串，每个子串里面都是最长的连续的相同字符。 因此我们
要有最小删除成本，只需要保留每个子串里cost最大的那个字符即可。
 */
class Solution {

    /**
     * @param String $s
     * @param Integer[] $cost
     * @return Integer
     * 508ms
     */
    function minCost($s, $cost) {
    	$n = count($cost);
    	$pre[0] = 1;
    	//计算字符串中相邻重复的元素个数
    	for ($i=1; $i < $n; $i++) { 
    		if($s[$i]==$s[$i-1]){
    			$pre[$i] = $pre[$i-1]+1;
    		}else{
    			$pre[$i] = 1;
    		}
    	}
    	$all=0;
    	$maxn = 0;
    	$ans = 0;
		for($i=$n-1;$i>=0;$i-=$pre[$i]){
			$all = 0;$maxn = 0;
			for($j=$i-$pre[$i]+1;$j<=$i;$j++){
			 	$all += $cost[$j];
			 	$maxn = max($maxn,$cost[$j]);
			}
			$ans += $all - $maxn;
		}
		return $ans;
    }
    //412ms
    function minCost1($s, $cost) {
        $len = strlen($s);
        $sum = 0;
        for($i=0; $i<$len-1; $i++){
            // 找到重复字符
            if($s{$i} == $s{$i+1}){
                // cost{i}>cost{i+1} 交换位置,取cost{i}
                if($cost{$i}>$cost{$i+1}){
                    $tmp = $cost[$i];
                    $cost[$i] = $cost[$i+1];
                    $cost[$i+1] = $tmp;
                }
                $sum+=$cost[$i];
            }
        }
        return $sum;
    }
}

$s = new Solution();
echo "<pre>";
var_dump($s->minCost("aabaa",[1,2,3,4,1]));