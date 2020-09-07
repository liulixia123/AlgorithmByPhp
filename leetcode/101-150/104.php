<?php
/**题目
给定一个二叉树，检查它是否是镜像对称的。 

例如，二叉树 [1,2,2,3,4,4,3] 是对称的。
    1
   / \
  2   2
 / \ / \
3  4 4  3
但是下面这个 [1,2,2,null,3,null,3] 则不是镜像对称的:

    1
   / \
  2   2
   \   \
   3    3
你可以运用递归和迭代两种方法解决这个问题吗？
*/
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
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
	public function maxDepth($root){
		if(!$root) return 0;
        $dl = $this->maxDepth($root->left);
        $dr = $this->maxDepth($root->right);
        return ($dl > $dr ? $dl : $dr) + 1;
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
var_dump($s->maxDepth($t1));