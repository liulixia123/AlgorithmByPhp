<?php
/**
 * 二叉树的右视图
 *     1
 *    2  3
 *     4   5
 *    输出 1 3 5
 * 解题：二叉树的层序遍历输出最右侧节点
 */

class Solution {
	function rightSideView($root){
		$queue = [];
		array_push($queue,$root);
		$res = [];
		$level=0;
		while($count = count($arr)){
			for($i=$count;$i>0;$i--){
				$node = array_shift($queue);
				$res[$level][] = $node->val;
				if($node->left){
					array_push($queue,$node->left);
				}
				if($node->right){
					array_push($queue,$node->right);
				}
			}
			$level++;
		}
		for ($i=0; $i < $level; $i++) { 
			$result[] = end($res[$i]);
		}
	}
}