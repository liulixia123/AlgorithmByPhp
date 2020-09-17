<?php
//打家劫舍
//你是一个专业的小偷，计划偷窃沿街的房屋。每间房内都藏有一定的现金，影响你偷窃的唯一制约因素就是相邻的房屋装有相互连通的防盗系统，
//如果两间相邻的房屋在同一晚上被小偷闯入，系统会自动报警。
//给定一个代表每个房屋存放金额的非负整数数组，计算你 不触动警报装置的情况下 ，一夜之内能够偷窃到的最高金额。

/*输入：[1,2,3,1]
输出：4
解释：偷窃 1 号房屋 (金额 = 1) ，然后偷窃 3 号房屋 (金额 = 3)。
     偷窃到的最高金额 = 1 + 3 = 4 。
输入：[2,7,9,3,1]
输出：12
解释：偷窃 1 号房屋 (金额 = 2), 偷窃 3 号房屋 (金额 = 9)，接着偷窃 5 号房屋 (金额 = 1)。
     偷窃到的最高金额 = 2 + 9 + 1 = 12 。
动态规划求解
*/

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function rob($nums) {
    	$len = count($nums);
	    if (!$len) return 0;
	    if ($len==1) return $nums[0];
	    if ($len==2) return max($nums[0], $nums[1]);

	    $dp = [];
	    $dp[-1] = 0;
	    $dp[-2] = 0;

	    for ($i=0; $i<$len; $i++) {
	        $dp[$i] = max($dp[$i-1], $dp[$i-2]+$nums[$i]);
	    }
	    
	    return $dp[$len-1];
    }
    function rob1($nums) {
	    $len = count($nums);
	    if (!$len) return 0;
	    if ($len==1) return $nums[0];
	    if ($len==2) return max($nums[0], $nums[1]);

	    $preOneDay = $preTwoDay = 0;

	    for ($i=0; $i<$len; $i++) {
	        $todayMax = max($preOneDay, $preTwoDay+$nums[$i]);
	        $preTwoDay = max($preTwoDay, $preOneDay);
	        $preOneDay = max($preOneDay,$todayMax);
	    }
	    
	    return $todayMax;
	}
}
$s = new Solution();
echo "<pre>";
var_dump($s->rob1([2,7,9,3,1]));