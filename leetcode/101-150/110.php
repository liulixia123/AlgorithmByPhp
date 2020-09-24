<?php
//判断一棵树是不是平衡二叉树
//平衡二叉树的定义是：树中每个节点都满⾜左右两个树的高度差 <= 1的这个条件。
/* Given the sorted array: [-10,-3,0,5,9],
One possible answer is: [0,-3,9,-10,null,5], which represents the following
height balanced BST:
    1
 / \
 2 2
 / \
 3 3
 / \
 4 4
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
    
    function isBalanced($root) {
        if($root==null) return true;
        $leftdepth = $this->depth($root->left);
        $rightdepth = $this->depth($root->right);
        return abs($leftdepth-$rightdepth)<=1&&$this->isBalanced($root->left)&&$this->isBalanced($root->right);
    }
    function depth($root){
      if($root==null) return ;
      return max($this->depth($root->left),$this->depth($root->right))+1;
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
$t5->left= $t6;
echo "<pre>";
var_dump($s->isBalanced($t1));