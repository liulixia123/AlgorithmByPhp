<?php
//给定一个二叉树，找出其最小深度。
//递归求出根节点到叶子节点的深度
/* Given the sorted array: [-10,-3,0,5,9],
One possible answer is: [0,-3,9,-10,null,5], which represents the following
height balanced BST:
   3
 / \
 9 20
 / \
 15 7
 结果为2
 false

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
    
    function minDepth($root) {
        if($root==null) return 0;
        $leftdepth = $this->minDepth($root->left);
        $rightdepth = $this->minDepth($root->right);
        return min($leftdepth,$rightdepth)+1;
    }
    
}
$s = new Solution();
$t1= new TreeNode(3);
$t2= new TreeNode(9);
$t3= new TreeNode(20);
$t4= new TreeNode(15);
$t5= new TreeNode(17);
$t6= new TreeNode(30);

$t1->left = $t2;
$t1->right = $t3;
$t3->left = $t4;
$t3->right = $t5;
echo "<pre>";
var_dump($s->minDepth($t1));