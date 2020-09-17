<?php
//验证二叉树是不是有效二叉搜索树
//假设一个二叉搜索树具有如下特征：
//节点的左子树只包含小于当前节点的数。
//节点的右子树只包含大于当前节点的数。
//所有左子树和右子树自身必须也是二叉搜索树。
/* 输入:
    2
   / \
  1   3
输出: true
输入:
    5
   / \
  1   4
     / \
    3   6
输出: false
利用中序遍历来存储在数组里判断后一个元素比前一个元素大证明是搜索树，反之不是
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
    function isValidBST($root) {
        if(!$root) return true;
        $res = [];
       $this->inOrder($root,$res);
       $len = count($res);
       for ($i=0; $i < $len-1; $i++) { 
           if($res[$i]>=$res[$i+1]) return false;
       }
       return true;
    }
    function inOrder($root,&$res){
        if(!$root) return ;
        $this->inOrder($root->left,$res);
        $res[] = $root->val;
        $this->inOrder($root->right,$res);
    }
}
$s = new Solution();
$t1= new TreeNode(1);
$t2= new TreeNode(2);
$t3= new TreeNode(3);

$t2->left = $t1;
$t2->right = $t3;
echo "<pre>";
var_dump($s->isValidBST($t2));