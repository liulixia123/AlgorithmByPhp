<?php
/**
 * 俄罗斯套娃信封问题  困难
 * 给定一些标记了宽度和高度的信封，宽度和高度以整数对形式 (w, h) 出现。当另一个信封的宽度和高度都比这个信封大的时候，这个信封就可以放进另一个信封里，如同俄罗斯套娃一样。

请计算最多能有多少个信封能组成一组“俄罗斯套娃”信封（即可以把一个信封放到另一个信封里面）。

说明:
不允许旋转信封。

示例:

输入: envelopes = [[5,4],[6,4],[6,7],[2,3]]
输出: 3 
解释: 最多信封的个数为 3, 组合为: [2,3] => [5,4] => [6,7]。

 */
class Solution {

    /**
     * @param Integer[][] $envelopes
     * @return Integer
     */
    function maxEnvelopes($envelopes) {
        if(empty($envelopes)) return 0;
        if(($n = count($envelopes))==1) return 1;
        //先排序按w升序排
        usort($envelopes, function($a, $b){
        	if($a[0]>$b[0]){
        		return 1;
        	}elseif($a[0]<$b[0]){
        		return -1;
        	}else{
        		return 0;
        	}
        });        
        //构建dp数组 到第i位能组成最大信封个数
        $dp = [];
        $res = 0;
        $dp[0] = 1;
        for ($i=0; $i < $n; $i++) { 
        	for ($j=0; $j <= $i; $j++) { 
        		if($envelopes[$j][1]<$envelopes[$i][1]){
        			$dp[$i] = max($dp[$i],$dp[$j]+1);        			
        			$res = max($res,$dp[$i]);
        		}
        	}
        }
        return $res;
    }
}

$obj = new Solution();
$envelopes = [[5,4],[6,4],[6,7],[2,3]];
echo $obj->maxEnvelopes($envelopes);