<?php
//二叉树中序遍历
/*  1
   / \
  2   2
 / \ / \
3  4 4  3
3 2 4 1 4 2 3
*/
//用递归很简单，能用迭代方式求解吗
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
    function inorderTraversal($root) {
        if($root==null) return [];
        $stack = $res = [];
        $cur = $root;
        while($cur!=null||!empty($stack)){
        	if($cur!=null){
        		array_push($stack,$cur);
        		$cur = $cur->left;
        	}else{
        		$cur = array_pop($stack);
        		$res[] = $cur->val;
        		$cur = $cur->right;
        	}
        }
        return $res;
    }
}
$s = new Solution();
$t1= new TreeNode(1);
$t2= new TreeNode(2);
$t3= new TreeNode(2);
$t4= new TreeNode(3);
$t5= new TreeNode(4);
$t6= new TreeNode(4);
$t7= new TreeNode(3);
$t1->left = $t2;
$t1->right = $t3;
$t2->left = $t4;
$t2->right = $t5;
$t3->left = $t6;
$t3->right = $t7;
echo "<pre>";
var_dump($s->inorderTraversal($t1));