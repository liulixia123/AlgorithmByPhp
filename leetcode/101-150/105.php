<?php
/**题目
从前序与中序遍历序列构造二叉树
根据一棵树的前序遍历与中序遍历构造二叉树。

注意:
你可以假设树中没有重复的元素。

例如，给出

前序遍历 preorder = [3,9,20,15,7]
中序遍历 inorder = [9,3,15,20,7]
返回如下的二叉树：

    3
   / \
  9  20
    /  \
   15   7

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
    private $inmap; //反转中序数组中所有键以及它们关联的值
    private $preindex = 0; // 前序参数索引
    private $preorder;//前序
    private $inorder;//中序
	public function buildTree($preorder, $inorder){
		$this->preorder = $preorder;
        $this->inorder = $inorder;
        $this->inmap = array_flip($inorder);
        return $this->helper(0,count($inorder)-1);
	}    
    
    function helper($instart,$inend){
        if($instart > $inend) return null;
        $nodeval = $this->preorder[$this->preindex];
        $inindex = $this->inmap[$nodeval];
        $node = new TreeNode($nodeval);
        $this->preindex++;
        
        $node->left = $this->helper($instart,$inindex-1);
        $node->right = $this->helper($inindex+1,$inend);
        return $node;
    }
}
$s = new Solution();
echo "<pre>";
print_r($s->buildTree([3,9,20,15,7],[9,3,15,20,7]));