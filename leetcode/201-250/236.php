<?php
/**
 * 公共祖先
 * 给定一个二叉树, 找到该树中两个指定节点的最近公共祖先。
 * 
 */
class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($value) { 
        $this->val = $value; 
    }
}
class Solution{
	function lowestCommonAncestor($root,$p,$q){
		if($root==null||$root==$p||$root==$q) return $root;
		$leftNode = $this->lowestCommonAncestor($root->left,$p,$q);
		$rightNode = $this->lowestCommonAncestor($root->right,$p,$q);
		if($leftNode!=null&&$rightNode!=null){
			return $root;
		}else{
			return $leftNode!=null?$leftNode:$rightNode;
		}
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
print_r($s->lowestCommonAncestor($t1,$t4,$t5));