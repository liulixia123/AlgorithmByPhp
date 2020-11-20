<?php
/**
 * 路径之和II
 * 给定一个二叉树和一个目标值，找出根节点到叶子节点的路径所经节点之和等于目标值。
 * 			  5
             / \
            4   8
           /   / \
          11  13  4
         /  \    / \
        7    2  5   1
        [
   [5,4,11,2],
   [5,8,4,5]
]
dfs深度优先遍历
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
	/**
     * @param TreeNode $root
     * @return Integer[]
     */
    
    function pathSum($root,$sum) {
    	$res = [];
        if($root==null) return [];
        $this->dfs($root,$res,$sum,[]);
        return $res;
    }
    function dfs($root,&$res,$sum,$b){
    	if($root->left==null&&$root->right==null&&$root->val==$sum){
        	array_push($b,$root->val);
        	array_push($res,$b);
            return $res;
        }else{
        	array_push($b,$root->val);
        	if($root->left!=null){        		
        		$this->dfs($root->left,$res,$sum-$root->val,$b);
        	}
        	if($root->right!=null){        		
        		$this->dfs($root->right,$res,$sum-$root->val,$b);
        	}
        }
    }
    
}
$s = new Solution();
$t1= new TreeNode(5);
$t2= new TreeNode(4);
$t3= new TreeNode(8);
$t4= new TreeNode(11);
$t5= new TreeNode(13);
$t6= new TreeNode(4);
$t7= new TreeNode(7);
$t8= new TreeNode(2);
$t9= new TreeNode(5);
$t10= new TreeNode(1);

$t1->left = $t2;
$t1->right = $t3;
$t2->left = $t4;
$t3->left = $t5;
$t3->right = $t6;
$t4->left = $t7;
$t4->right = $t8;
$t6->left = $t9;
$t6->right = $t10;
echo "<pre>";
print_r($s->pathSum($t1,22));