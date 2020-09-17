<?php
//翻转二叉树
/* 	 4
   /   \
  2     7
 / \   / \
1   3 6   9
	 4
   /   \
  7     2
 / \   / \
9   6 3   1
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
    function invertTree($root) {
    	//左右数对调
        if($root == null) return null;

        list($root->left,$root->right) = [$this->invertTree($root->right),$this->invertTree($root->left)];

        return $root;
    }
    //非递归方式
    function invertTree1($root) {
        if ($root == null) return null;
        $queue = [];
        array_push($queue, $root);
        $result = $root;
        while($queue) {            
            $node = array_shift($queue);
            $nodeTemp = $node->left;
            $node->left = $node->right;
            $node->right = $nodeTemp;
            if ($node->left) {
                array_push($queue, $node->left);
            }
            if ($node->right) {
                array_push($queue, $node->right);
            }
        }

        return $root;
    }
}
$t1 = new TreeNode(4);
$t2 = new TreeNode(2);
$t3 = new TreeNode(7);
$t4 = new TreeNode(1);
$t5 = new TreeNode(3);
$t6 = new TreeNode(6);
$t7 = new TreeNode(9);
$t1->left = $t2;
$t1->right = $t3;
$t2->left = $t4;
$t2->right = $t5;
$t3->left = $t6;
$t3->right = $t7;

$s = new Solution();
echo "<pre>";
print_r($s->invertTree1($t1));