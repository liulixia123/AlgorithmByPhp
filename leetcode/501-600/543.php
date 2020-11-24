<?php
//二叉树的直径
//给定一棵二叉树，你需要计算它的直径长度。一棵二叉树的直径长度是任意两个结点路径长度中的最大值。这条路径可能穿过也可能不穿过根结点。
//使得每个节点的值是原来的节点值加上所有大于它的节点值之和。
/* 	 示例 :
给定二叉树

          1
         / \
        2   3
       / \     
      4   5    
返回 3, 它的长度是路径 [4,2,1,3] 或者 [5,2,1,3]。

 

注意：两结点之间的路径长度是以它们之间边的数目表示。
解题思路求左右子树的深度，最长路径就是左右子树的深度之和
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

    public $max = 0;

    /**
     * @param TreeNode $root
     * @return TreeNode
     */
    function diameterOfBinaryTree($root) {
      $this->maxdepth($root);

      return $this->max;
    }
    function maxdepth(&$node)
    {
        if ($node == null) {
            return 0;
        }
        $L = $this->maxdepth($node->left);
        $R = $this->maxdepth($node->right);
        $this->max = max($this->max,$R+$L);
        return max($L,$R)+1;
    }
    
}
$t1 = new TreeNode(1);
$t2 = new TreeNode(2);
$t3 = new TreeNode(3);
$t4 = new TreeNode(4);
$t5 = new TreeNode(5);

$t1->left = $t2;
$t1->right = $t3;
$t2->left = $t4;
$t2->right = $t5;

$s = new Solution();
echo "<pre>";
print_r($s->diameterOfBinaryTree($t1));