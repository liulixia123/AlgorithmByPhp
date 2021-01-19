<?php
/**
 * 后继节点
 */
class Solution {

	function inorderSuccessor($root,$p){
		//分两种情况有无右子树		
		//有右子树，返回右子树最左节点
		//无右子树，找到父节点判断节点是父节点的左子树吗不是左子树继续找父节点直到是左子树返回该父节点
		if($p->right!=null){
			$cur = $p->right;
			while ($cur->left!=null) {
				$cur = $cur->left;
			}
			return $cur;
		}
		while($p->parent!=null&&$p->parent->right==$p){
			$p = $p->parent;
		}
		return $p->parent;
	}
}

class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    public $parent = null;
    function __construct($value) { 
        $this->val = $value; 
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
$t1->right = $t3;
$t2->left = $t4;
$t2->right = $t5;
$t3->left = $t6;
$t2->parent = $t1;
$t3->parent = $t1;
$t4->parent = $t2;
$t5->parent = $t2;
$t6->parent = $t3;
echo "<pre>";
print_r($s->inorderSuccessor($t1,$t5));