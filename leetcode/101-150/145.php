<?php
/**
 * 二叉树后序遍历
 */

class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    public $flag = 0;
    function __construct($value) { 
        $this->val = $value; 
    }
}
class Solution{
	function postOrder($root){
		if(empty($root)) return [];
        $stack = $res = [];
        $p = $root;
        while( $root != null || empty($stack) ){
            while( $p != null ){ 
            	$p->flag = 1;               
                array_push($stack,$p);        
                $p = $p->left;
            }
            if( !empty($stack) ){
                $p = array_pop($stack);
                if($p->flag == 1){
                	$p->flag = 2;
                    array_push($stack,$p);                    
                    //$p = $p->right; 
                }elseif($p->flag == 2){
                    $p = array_pop($stack);
                    $res[] = $p->val;
                    $p = $p->right; 
                }
                
            }               
            
        }
        return $res;
	}

	function postOrder1($root){
		if(empty($root)) return [];
		$stack = $res = [];
		$p = $root;
		array_push($stack,$root);
		while(!empty($stack)){
			$node = array_pop($stack);
			array_unshift($res, $node->val);
			if($node->left!=null){
				array_push($stack,$node->left);
			}
			if($node->right!=null){
				array_push($stack,$node->right);
			}
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
$t6= new TreeNode(6);

$t1->left = $t2;
$t1->right = $t3;
$t2->left = $t4;
$t2->right = $t5;
$t3->right = $t6;
echo "<pre>";
print_r($s->postOrder1($t1));
