<?php
//二叉树的层序遍历
//从左至右遍历输出下一层从右至左输出，依次一层层遍历
/* 二叉树：[3,9,20,null,null,15,7],

    3
   / \
  9  20
    /  \
   15   7
返回其层次遍历结果：

[
  [3],
  [20,9],
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
    function zigzagLevelOrder($root) {
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
            if($level&1==1){// 反转结果
              $res[$level] = $this->reverseNode($res[$level]);
            }
            $level++;
        }
        return $res;
    }
    //反转当前层
    function reverseNode($queue){
      $n  = count($queue);
      $res = [];
      for ($i=$n-1; $i >=0; $i--) { 
        $res[] = $queue[$i];
      }
      return $res;
    }
}
$s = new Solution();
$t1= new TreeNode(1);
$t2= new TreeNode(2);
$t3= new TreeNode(3);
$t4= new TreeNode(4);
$t5= new TreeNode(5);
//[1,2,3,4,null,null,5]
$t1->left = $t2;
$t1->right = $t3;
$t2->left = $t4;
$t3->right = $t5;
echo "<pre>";
var_dump($s->zigzagLevelOrder($t1));