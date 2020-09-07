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
	public function isSymmetric($root){
		if(!$root) return true;
        return $this->isSymmetricdigui($root->left,$root->right);
	}
    private function isSymmetricdigui($left,$right){//递归方式实现
        if (!$left && !$right) return true;
        if ($left && !$right || !$left && $right || $left->val != $right->val) return false;
        return $this->isSymmetricdigui($left->left, $right->right) && $this->isSymmetricdigui($left->right, $right->left);
    }
    //迭代方式实现
    public function isSymmetric1($root){
        if(!$root) return true;
        //用数组队列方式存储左右两个子树
        $q1 = $q2 = [];
        array_push($q1,$root->left);
        array_push($q2,$root->right);
        while (!empty($q1)&&!empty($q2)) {
            $node1 = $q1[0];
            $node2 = $q2[0];
            array_shift($q1);
            array_shift($q2);
            if((!$node1&&$node2)||($node1&&!$node2)) return false;
            if($node1){
                if($node1->val!=$node2->val) return false;
                array_push($q1,$node1->left);
                array_push($q1,$node1->right);
                array_push($q2,$node2->right);
                array_push($q2,$node2->left);
                
            }
        }
        return true;
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
var_dump($s->isSymmetric1($t1));