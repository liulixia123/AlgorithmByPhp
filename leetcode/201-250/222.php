<?php
/**
 * 完全二叉树的节点个数
 */
class Solution{
	function countNodes($root){
		if($root==null) return 0;
		return $this->countNodes($root->left)+$this->countNodes($root->right)+1;
	}
    /**
     * 时间复杂度低于N的
     */
    function countNodes1($root){
        if($root==null) return 0;
        $count = 1;
        $lh = $this->getHeight($root->left);
        $rh = $this->getHeight($root->right);
        if($lh==$rh){
            return $count += pow(2,$lh)-1+$this->countNodes($root->right);
        }else{
            return $count += pow(2,$rh)-1+$this->countNodes($root->left);
        }
        
    }
    //求数的高度
    function getHeight($root){
        if($root==null) return 0;
        return $this->getHeight($root->left)+1;
    }
}
class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($value) { 
        $this->val = $value; 
    }
}

$s = new Solution();
$t1= new TreeNode(1);
$t2= new TreeNode(2);
$t3= new TreeNode(3);
$t4= new TreeNode(4);
$t5= new TreeNode(5);
$t6= new TreeNode(6);

$t1->left = $t2;
$t1->right = $t3;
$t2->left = $t4;
$t2->right = $t5;
$t3->left = $t6;
echo "<pre>";
print_r($s->countNodes1($t1));