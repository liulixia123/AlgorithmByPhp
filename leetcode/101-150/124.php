<?php
/**
 * 最大路径和
 * [1,2,3]
 * 输出6
 *  -10
   / \
  9  20
    /  \
   15   7
15+20+7=42
 */
class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($value) { 
        $this->val = $value; 
    }
}
class Solution {
	function maxPathSum($root){
		if($root==null) return 0;
		$max = 0;
		$this->maxGain($root,$max);
		return $max;
	}

	function maxGain($root,&$max){
		if($root==null) return ;
		//求左子树最大贡献值
		$leftGain = max($this->maxGain($root->left,$max),0);
		//求右子树最大贡献值
		$rightGain = max($this->maxGain($root->right,$max),0);
		//节点中最大贡献值取决于左右两个子树和自身节点值
		$priceNewpath  = $root->val+$leftGain+$rightGain;
		//求出最大值
		$max = max($priceNewpath,$max);
		return $root->val+$leftGain+$rightGain;
	}
}

$s = new Solution();
$t1= new TreeNode(-10);
$t2= new TreeNode(9);
$t3= new TreeNode(20);
$t4= new TreeNode(15);
$t5= new TreeNode(7);


$t1->left = $t2;
$t1->right = $t3;
$t3->left = $t4;
$t3->right = $t5;

echo "<pre>";
print_r($s->maxPathSum($t1));