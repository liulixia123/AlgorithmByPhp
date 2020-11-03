<?php
/**
 * 字符串 S 由小写字母组成。我们要把这个字符串划分为尽可能多的片段，同一个字母只会出现在其中的一个片段。返回一个表示每个字符串片段的长度的列表。
示例 1：
输入：S = "ababcbacadefegdehijhklij"
输出：[9,7,8]
解释：
划分结果为 "ababcbaca", "defegde", "hijhklij"。
每个字母最多出现在一个片段中。
像 "ababcbacadefegde", "hijhklij" 的划分是错误的，因为划分的片段数较少。

 */

class Solution {

    /**
     * @param String $S
     * @return Integer[]
     */
    function partitionLabels($S) {
    	$len = strlen($S);
    	//记录字母最后出现位置
    	for ($i=0; $i < $len; $i++) { 
    		$count[$S[$i]] = $i;
    	}
    	$left = $right = 0;
    	$res = [];
    	for ($i=0; $i < $len; $i++) { 
    		//最远边界
    		$right = max($right,$count[$S[$i]]);
    		if($i==$right){
    			array_push($res,$right-$left+1);
    			$left = $i+1;
    		}
    	}
    	return $res;
    }
}

$s = new Solution();
echo "<pre>";
print_r($s->partitionLabels("ababcbacadefegdehijhklij"));