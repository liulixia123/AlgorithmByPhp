<?php
//二叉树的层序遍历
//从左至右一层层遍历输出。
/* 二叉树：[3,9,20,null,null,15,7],

    3
   / \
  9  20
    /  \
   15   7
返回其层次遍历结果：

[
  [3],
  [9,20],
  [15,7]
]

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
    //模拟队列的方式，先进先出
    function levelOrder($root) {
        $res = $arr = [];
        if($root ==null){
            return $res;
        }
        array_push($arr,$root);
        $level = 0;
        while($count = count($arr)){
            for($i=$count;$i>0;$i--){
                $node = array_shift($arr);//先入先出
                $res[$level][] = $node->val;
                if($node->left !=null) array_push($arr,$node->left);
                if($node->right !=null) array_push($arr,$node->right);
            }
            $level++;
        }
        return $res;
    }
}
$s = new Solution();
$t1= new TreeNode(3);
$t2= new TreeNode(9);
$t3= new TreeNode(20);
$t4= new TreeNode(15);
$t5= new TreeNode(17);

$t1->left = $t2;
$t1->right = $t3;
$t3->left = $t4;
$t3->right = $t5;
echo "<pre>";
var_dump($s->levelOrder($t1));