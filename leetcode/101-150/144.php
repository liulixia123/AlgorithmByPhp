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
    function preorder1($root){
        if(empty($root)) return [];
        $stack = $res = [];
        $p = $root;
        array_push($stack,$root);//根节点压栈
        while(!empty($stack)){
            $node = array_pop($stack);
            $res[] = $node->val;
            if($node->right!=null){
                 array_push($stack,$node->right);
            }
            if($node->left!=null){
                 array_push($stack,$node->left);
            }          
            
        }
        return $res;
    }
    //中序遍历 左中右
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
    //后序遍历
    //左右中  先序中左右 变成 中右左 在逆序
    function postorder($root){
        if(empty($root)) return [];
        $stack = $stack2 = $res = [];
        $p = $root;
        array_push($stack,$root);//根节点压栈
        while(!empty($stack)){
            $node = array_pop($stack); 
            array_push($stack2,$node);//将出栈1的节点压入栈2           
            if($node->left!=null){
                 array_push($stack,$node->left);
            }
            if($node->right!=null){
                 array_push($stack,$node->right);
            }          
            
        }
        while(!empty($stack2)){
            $node = array_pop($stack); 
            $res[] = $node->val;
        }
        return $res;    
    }
}