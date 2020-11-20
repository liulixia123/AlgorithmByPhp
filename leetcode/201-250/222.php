<?php
/**
 * 完全二叉树的节点个数
 */
class Solution{
	function countNodes($root){
		if($root==null) return 0;
		return $this->countNodes($root->left)+$this->countNodes($root->right)+1;
	}
}