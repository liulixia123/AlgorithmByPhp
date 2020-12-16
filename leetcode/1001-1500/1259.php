<?php
/**
 * 不相交的握手
 * 偶数 个人站成一个圆，总人数为 num_people 。每个人与除自己外的一个人握手，所以总共会有 num_people / 2 次握手。

将握手的人之间连线，请你返回连线不会相交的握手方案数。

由于结果可能会很大，请你返回答案 模 10^9+7 后的结果。

示例 1：
输入：num_people = 2
输出：1
1 -》2
示例 2：

输入：num_people = 4
输出：2
解释：总共有两种方案，第一种方案是 [(1,2),(3,4)] ，第二种方案是 [(2,3),(4,1)] 。

示例 3：

输入：num_people = 6
输出：5

示例 4：
输入：num_people = 8
输出：14 
提示：
2 <= num_people <= 1000
num_people % 2 == 0
卡特兰数列
 */
class Solution{
	/**
	 * 动态规划
	 * 考虑 n 个人， 1号跟其他的偶数号握手才可以，不然有落单的，总计 n/2 次
	 * 1号跟另一个人握手，把人群分成了两个子问题，两边的数量相乘即可，n-2人，分成2半（0，n-2）(2, n-4)…
	 * @param  [type] $num_people [description]
	 * @return [type]             [description]
	 */
	function numberOfWays($num_people){
		if($num_people==2) return 1;
		if($num_people==4) return 2;
		$dp = [];
		$dp[0] = 1;
		$dp[2] = 1;
		$dp[4] = 2;
		for ($i=6; $i <= $num_people; $i+=2) { 
			for ($j=0; $j < intval($i/2); $j++) {				
				$dp[$i] = ($dp[$i]+$dp[2*$j]*$dp[$i-2-2*$j])%1000000007;
			}
		}
		return $dp[$num_people];
	}
}

$s = new Solution();
echo "<pre>";
var_dump($s->numberOfWays(10));