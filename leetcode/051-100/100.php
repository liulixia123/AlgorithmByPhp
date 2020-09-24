<?php
//判断两棵树是否相等
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
    function isSameTree($p,$q) {
    	if($p==null&&$q==null){
    		return true;
    	}elseif($p!=null&&$q!=null){
    		if($p->val!=$q->val){
    			return false;
    		}
    		return $this->isSameTree($p->left,$q->left)&&$this->isSameTree($p->right,$q->right);
    	}else{
    		return false;
    	}
    }
}