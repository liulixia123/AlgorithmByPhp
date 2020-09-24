<?php
//将一个按照升序排列的有序数组，转换为一颗高度平衡二叉搜索树
//从下往上一层层遍历，从左到右依次一层层遍历
/* Given the sorted array: [-10,-3,0,5,9],
One possible answer is: [0,-3,9,-10,null,5], which represents the following
height balanced BST:
    0
   / \
  -3 9
  / /
-10 5

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
    
    function sortedArrayToBST($nums) {
        $len = count($nums);
        if($len<=0) return null;
        if($len ==1) return new TreeNode($nums[0]);
        $mid = intval($len/2);
        $tree = new TreeNode($nums[$mid]);
        for($i=0;$i<$mid;$i++){
          $leftnums[] = $nums[$i];
        }
        for($j=$mid+1;$j<$len;$j++){
          $rightnums[] = $nums[$j];
        }
        $tree->left = $this->sortedArrayToBST($leftnums);
        $tree->right = $this->sortedArrayToBST($rightnums);
        $leftnums = [];
        $rightnums = [];
        return $tree;
    }
}
$s = new Solution();
echo "<pre>";
var_dump($s->sortedArrayToBST([-10,-3,0,5,9]));