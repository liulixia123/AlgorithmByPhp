<?php
/*
子集
给定一组不含重复元素的整数数组 nums，返回该数组所有可能的子集（幂集）。

说明：解集不能包含重复的子集。

示例:

输入: nums = [1,2,3]
输出:
[
  [3],
  [1],
  [2],
  [1,2,3],
  [1,3],
  [2,3],
  [1,2],
  []
]
解法一，迭代[] 把每个元素和之前的集合合并
解法二，递归
解法三，回溯法
解法四，动态规划
 */
class Solution {
    protected $ans;
    protected $result;
    /**
     * @param Integer[] $nums
     * @return Integer[][]
     * 迭代求解
     */
    function subsets1($nums) {
        if (is_null($nums)) {
            return [];
        }
        // 1. 迭代法
        $result = [[]];
        if (empty($nums)){
            return $result;
        }
        foreach ($nums as $num) {
            foreach ($result as $item) {
                $tmp = $item;
                $tmp[] = $num;
                $result[] = $tmp;
            }
        }

        return $result;
    }
    /**
     * 递归求解
     */
    function subsets2($nums) {
         $n = count($nums);
        if ($n === 0) return [];
        
        // 访问路径栈，使用数组模拟，全局只维护一份
        $stack = [];
        $this->dfs($nums, $n, 0, $stack);
        return $this->ans;
    }
    private function dfs($nums, $n, $index, $stack)
    {
        // 递归至叶子节点，加入结果集
        if ($index === count($nums)) {
            $this->ans[] = $stack;
            return;
        }

        // 这里隐藏了一个回溯的过程，即路径栈先入栈一个空，递归后再出栈一个空。
        // 与选择了当前元素的过程一致
        $this->dfs($nums, $n, $index + 1, $stack);
        
        array_push($stack, $nums[$index]);
        $this->dfs($nums, $n, $index + 1, $stack);
        // 由于是使用了 PHP 的数组，这里可以不用回溯。
        // 但是如果是先取当前元素，后不取，就会对不取的过程造成影响，为了代码完整性，还是要加上
        array_pop($stack);
    }
    /**
     * 回溯法
     */
    function subsets3($nums) {
        // 画出递归树，答案是遍历递归树的所有节点
        $this->result[] = [];
        $this->sub($nums, [], 0);
        return $this->result;
    }
    private function sub($nums, $list, $start)
    {
        if (count($list) == count($nums)) {
            return;
        }
        for ($i = $start; $i < count($nums); ++$i) {
            $list[] = $nums[$i];
            // 在这里，递归中途添加，而不是递归终止条件处添加
            $this->result[] = $list;
            $this->sub($nums, $list, $i + 1);
            array_pop($list);
        }
    }
    /**
     * @param Integer[] $nums
     * @return Integer[][]
     * 动态规划求解
     */
    function subsets($nums) {
        $n = count($nums);
        if($n<=0) return [[]];
        $dp[1] = [[],[$nums[0]]];
	    for($i=2;$i<=$n;$i++){
	        $tmpall = [];
	        for($j=0;$j<count($dp[$i-1]);$j++){
	            $tmp = $dp[$i-1][$j];
	            array_push($tmp,$nums[$i-1]);
	            array_push($tmpall,$tmp);
	        }
	        $dp[$i] = array_merge($dp[$i-1],$tmpall);
	    }
	    return $dp[$n];
    }
}

$obj = new Solution();
$nums = [1,2,3];
echo "<pre>";
print_r($obj->subsets3($nums));