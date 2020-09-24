<?php
//给定一个二叉树和一个目标值，找出根节点到叶子节点的路径所经节点之和等于目标值。
//递归求解
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
    
    function hasPathSum($root,$sum) {
        if($root==null) return false;
        if($root->left==null&&$root->right==null){
            return $root->val==$sum;
        }
        return $this->hasPathSum($root->left,$sum-$root->val) ||$this->hasPathSum($root->right,$sum-$root->val) ;
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
var_dump($s->hasPathSum($t1,20));