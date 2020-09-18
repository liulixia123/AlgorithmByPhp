<?php
/**题目
二叉树展开成链表
给定一个二叉树，原地将它展开为一个单链表。

例如，给定二叉树

    1
   / \
  2   5
 / \   \
3   4   6
将其展开为：

1
 \
  2
   \
    3
     \
      4
       \
        5
         \
          6

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
class ListNode{
  public $val;
  public $next;
  public function __construct($val){
    $this->val = $val;
    $this->next = NULL;
  }
}
class Solution{
   
	private $pre=null;
    function flatten($root) {
        if($root==null)
            return ;
        $this->flatten($root->right);
        $this->flatten($root->left);
        $root->right=$this->pre;
        $root->left=null;
        $this->pre=$root;
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
$t1->right = $t5;
$t2->left = $t3;
$t2->right = $t4;
$t5->right = $t6;
echo "<pre>";
print_r($s->flatten($t1));