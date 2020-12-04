<?php
/**
 * 分割数组为连续子序列
 * 给你一个按升序排序的整数数组 num（可能包含重复数字），请你将它们分割成一个或多个子序列，其中每个子序列都由连续整数组成且长度至少为 3 。

如果可以完成上述分割，则返回 true ；否则，返回 false 。

示例 1：
输入: [1,2,3,3,4,5]
输出: True
解释:
你可以分割出这样两个连续子序列 : 
1, 2, 3
3, 4, 5
示例 2：
输入: [1,2,3,3,4,4,5,5]
输出: True
解释:
你可以分割出这样两个连续子序列 : 
1, 2, 3, 4, 5
3, 4, 5 
示例 3：
输入: [1,2,3,4,4,5]
输出: False
 */
class Solution {

    /**
     * hash解，贪心算法
     * @param Integer[] $nums
     * @return Boolean
     */
    function isPossible($nums) {
    	$n = count($nums);
    	if($n<=2) return false;
    	$map = $need = [];//$need 是记录需要的数
    	for ($i=0; $i < $n; $i++) { //记录每个数字出现次数
    		$map[$nums[$i]]++;
    	}
    	for ($i=0; $i < $n; $i++) { 
    		if($map[$nums[$i]]==0){//该数已经和其他数构成了一个连续序列
    			continue;
    		}elseif($need[$nums[$i]]>0){////若没有，先检测能不能和前面的连接起来
    			$need[$nums[$i]]--;
                $need[$nums[$i]+1]++;
    		}elseif($map[$nums[$i]+1]>0&&$map[$nums[$i]+2]>0){////然后再检测能不能和后面的组成一个连续序列
    			$map[$nums[$i]+1]--;
    			$map[$nums[$i]+2]--;
    			$need[$nums[$i]+3]++;
    		}else{//都不能
    			return false;
    		}
    		$map[$nums[$i]]--;
    	}
    	return true;
    }
}


$obj = new Solution();
echo "<pre>";
$nums = [1,2,3,4,4,5];
print_r($obj->isPossible($nums));