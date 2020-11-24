<?php
/**
 * 二叉树的最大宽度
 *     1
     /   \
    3     2
   / \     \  
  5   3     9 
  The maximum width existing in the third level with the length 4 (5,3,null,9). 
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
    function widthOfBinaryTree($root){
    	if($root==null) return 0;
    	$LeftPosOflv = [];
    	$ans = 1;
    	$this->dfs($root,0,0,$LeftPosOflv,$ans);
    	return $ans;
    }
    function dfs($root,$depth,$pos,&$LeftPosOflv,&$ans){
    	if($root==null) return;
    	if(count($LeftPosOflv)<=$depth){
    		array_push($LeftPosOflv,$pos);
    	}
    	$ans = max($ans,$pos-$LeftPosOflv[$depth]+1);
    	$this->dfs($root->left,$depth+1,2*$pos+1,$LeftPosOflv);
    	$this->dfs($root->right,$depth+1,2*$pos+2,$LeftPosOflv);
    }
}