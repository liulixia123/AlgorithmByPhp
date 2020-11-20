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