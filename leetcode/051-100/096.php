<?php
//不同的二叉搜索树
//给定n个节点可以构建多少种二叉树
/* 输入: 3
输出: 5
解释:
给定 n = 3, 一共有 5 种不同结构的二叉搜索树:

   1         3     3      2      1
    \       /     /      / \      \
     3     2     1      1   3      2
    /     /       \                 \
   2     1         2                 3

卡特兰数列 进出栈问题
1 1 2 5 14 42 132 429
*/
//
class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($value) { 
        $this->val = $value; 
    }
}
class Solution{
	/**
     * @param TreeNode $root
     * @return Integer[]
     */
    function numTrees($n) {
        if($n<0) return 0;
        $dp = [1,1];
        for ($i=2; $i <=$n; $i++) { 
           $dp[$i] = $dp[$i-1]*(4*$i-2)/($i+1);
        }
        return $dp[$n];
    }
}
$s = new Solution();
echo "<pre>";
var_dump($s->numTrees(3));