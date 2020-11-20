<?php
//合并二叉树
//给定两个二叉树，想象当你将它们中的一个覆盖到另一个上时，两个二叉树的一些节点便会重叠。
//你需要将他们合并为一个新的二叉树。
//合并的规则是如果两个节点重叠，那么将他们的值相加作为节点合并后的新值，
//否则不为 NULL 的节点将直接作为新二叉树的节点。

/*输入: 
  Tree 1                     Tree 2                  
          1                         2                             
         / \                       / \                            
        3   2                     1   3                        
       /                           \   \                      
      5                             4   7                  
输出: 
合并后的树:
       3
      / \
     4   5
    / \   \ 
   5   4   7
注意: 合并必须从两个树的根节点开始。
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
    function __construct($value) { $this->val = $value; }
}
class Solution {

    /**
     * @param TreeNode $root
     * @return TreeNode
     */
    function mergeTrees($t1, $t2){
    	if ($t1 == null) return $t2;
      if ($t2 == null) return $t1;

      $t1->val += $t2->val;
      $t1->left = $this->mergeTrees($t1->left, $t2->left);
      $t1->right = $this->mergeTrees($t1->right, $t2->right);

      return $t1;
    }
    
    
}
$t1 = new TreeNode(1);
$t2 = new TreeNode(3);
$t3 = new TreeNode(2);
$t4 = new TreeNode(5);

$t5 = new TreeNode(2);
$t6 = new TreeNode(1);
$t7 = new TreeNode(3);
$t8 = new TreeNode(4);
$t9 = new TreeNode(7);

$t1->left = $t2;
$t1->right = $t3;
$t2->left = $t4;
$t5->left = $t6;
$t5->right = $t7;
$t6->right = $t8;
$t7->right = $t9;

$s = new Solution();
echo "<pre>";
print_r($s->mergeTrees($t1,$t5));