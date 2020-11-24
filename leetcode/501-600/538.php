<?php
//把二叉搜索树转换为累加树
//给定一个二叉搜索树（Binary Search Tree），把它转换成为累加树（Greater Tree)，
//使得每个节点的值是原来的节点值加上所有大于它的节点值之和。
/* 	 输入: 原始二叉搜索树:
              5
            /   \
           2     13

输出: 转换为累加树:
             18
            /   \
          20     13
反向中序遍历，每次把右边数计算出来加上自身值就是累加数
*/
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($value) { $this->val = $value; }
}
class Solution {

    /**
     * @param TreeNode $root
     * @return TreeNode
     */
    function convertBST($root) {
    	$num = 0;
        $this->inOrder($root,$num);

        return $root;
    }
    function inOrder(&$node, &$num)
    {
        if ($node == null) {
            return;
        }
        $this->inOrder($node->right, $num);
        $node->val += $num;
        $num = $node->val;
        $this->inOrder($node->left, $num);
    }
    
}
$t1 = new TreeNode(5);
$t2 = new TreeNode(2);
$t3 = new TreeNode(13);
$t4 = new TreeNode(1);
$t5 = new TreeNode(3);
$t6 = new TreeNode(6);
$t7 = new TreeNode(9);
$t1->left = $t2;
$t1->right = $t3;


$s = new Solution();
echo "<pre>";
print_r($s->convertBST($t1));