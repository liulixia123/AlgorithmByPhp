<?php
/**
 * 二叉树的前序遍历
 */
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer[]
     * 用迭代方式完成
     */
    function preorderTraversal($root) {
    	if(empty($root)) return [];
        $queue = [];
        $current_node = $root;
        $res = [];
        array_push($queue,$root);
        while(!empty($queue)){        	
        	$current_node = array_shift($queue);
        	$res[] = $current_node->val;
        	if($current_node->left){
        		array_push($queue,$current_node->left);
        	}
        	if($current_node->right){
        		array_push($queue,$current_node->right);
        	}
        }
        return $res;
    }

    function preorder($root){
        if(empty($root)) return [];
        $stack = $res = [];
        $p = $root;
        while($root!=null||empty($stack)){
            while($p!=null){
                $res[] = $p->val;
                array_push($stack,$p);
                $p = $p->left;
            }
            if(!empty($stack)){
                $p = array_pop($stack);
                $p = $p->right;
            }               
            
        }
        return $res;
    }

    function inorder($root){
        if(empty($root)) return [];
        $stack = $res = [];
        $p = $root;
        while($root!=null||empty($stack)){
            while($p!=null){                
                array_push($stack,$p);
                $p = $p->left;
            }
            if(!empty($stack)){
                $p = array_pop($stack);
                $res[] = $p->val;
                $p = $p->right;
            }               
            
        }
        return $res;
    }

    function postorder($root){
        if(empty($root)) return [];
        $stack = $res = [];
        $p = $root;
        while($root!=null||empty($stack)){
            while($p!=null){                
                array_push($stack[$p],$p);
                array_push($stack[$p]['flag'],1);
                $p = $p->left;
            }
            if(!empty($stack)){
                $p = array_pop($stack);
                if($p['flag']==1){
                    array_push($stack[$p],$p);
                    array_push($stack[$p]['flag'],2);
                    $p = $p->right; 
                }elseif($p['flag']==2){
                    $p = array_pop($stack);
                    $res[] = $p->val;
                    $p = $p->right; 
                }
                
            }               
            
        }
        return $res;
    }
}