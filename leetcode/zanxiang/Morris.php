<?php
/**
 * morris算法
 */
function morris($head){
	if($head == null){
		return ;
	}
	$cur = $head;
	$mostRight = null;
	while($cur!=null){
		$mostRight = $cur->left;
		if($mostRight!=null){
			while ($mostRight->right!=null&&$mostRight->right!=$cur) {
				$mostRight = $mostRight->right;
			}
			if($mostRight->right==null){
				$mostRight->right = $cur;
				$cur = $cur->left;
				continue;
			}else{
				$mostRight->right = null;
			}
		}
		$cur = $cur->right;
	}
}

//先序
function morrisPre($head){
	if($head == null){
		return ;
	}
	$cur = $head;
	$mostRight = null;
	while($cur!=null){
		$mostRight = $cur->left;		
		if($mostRight!=null){
			while ($mostRight->right!=null&&$mostRight->right!=$cur) {
				$mostRight = $mostRight->right;
			}
			if($mostRight->right==null){
				$mostRight->right = $cur;
				echo $cur->val;
				$cur = $cur->left;
				continue;
			}else{
				$mostRight->right = null;
			}
		}else{
			echo $cur->val;
		}
		
		$cur = $cur->right;
	}
}
//中序遍历
function morrisIn($head){
	if($head == null){
		return ;
	}
	$cur = $head;
	$mostRight = null;
	while($cur!=null){
		$mostRight = $cur->left;
		if($mostRight!=null){
			while ($mostRight->right!=null&&$mostRight->right!=$cur) {
				$mostRight = $mostRight->right;
			}
			if($mostRight->right==null){
				$mostRight->right = $cur;
				$cur = $cur->left;				
				continue;
			}else{
				$mostRight->right = null;
			}
		}
		echo $cur->val;
		$cur = $cur->right;
	}
}
//后序遍历
function morrisPost($head){
	if($head == null){
		return ;
	}
	$cur = $head;
	$mostRight = null;
	while($cur!=null){
		$mostRight = $cur->left;
		if($mostRight!=null){
			while ($mostRight->right!=null&&$mostRight->right!=$cur) {
				$mostRight = $mostRight->right;
			}
			if($mostRight->right==null){
				$mostRight->right = $cur;
				$cur = $cur->left;
				
				printTreeReverse($cur);
				continue;
			}else{
				$mostRight->right = null;
				printTreeReverse($cur->left);
			}
		}
		
		$cur = $cur->right;
	}
	printTreeReverse($head);
}
//逆序打印节点右边界
function printEdge($head){
	$tail = reverseEdge($head);
	$cur = $tail;
	while ($cur!=null) {
		echo $cur->val;
		$cur = $cur->right;
	}
	reverseEdge($tail);
}

//反转右边界
function reverseEdge($head){
	$pre = null;
	$cur = $head;	
	while($cur!=null){
		$next = $cur->right;
		$cur->right = $pre;
		$pre = $cur;
		$cur = $next;
	}
	return $pre;
}
//判断是不是搜索二叉树,中序遍历是递增的结果
function isBST($head){
	if($head == null){
		return ;
	}
	$cur = $head;
	$mostRight = null;
	$pre = -1;
	while($cur!=null){
		$mostRight = $cur->left;
		if($mostRight!=null){
			while ($mostRight->right!=null&&$mostRight->right!=$cur) {
				$mostRight = $mostRight->right;
			}
			if($mostRight->right==null){
				$mostRight->right = $cur;
				$cur = $cur->left;				
				continue;
			}else{
				$mostRight->right = null;
			}
		}
		if($pre!=-1&&$pre>$cur->val){
			return false;
		}
		$pre = $cur->val;
		$cur = $cur->right;
	}
	return true;
}

//判断一棵树的最小路径
function minDepth($head){
	if($head == null){
		return ;
	}
	$cur = $head;
	$mostRight = null;
	$curlevel = 0;
	$minDepth = PHP_INT_MAX;
	while($cur!=null){
		$mostRight = $cur->left;
		if($mostRight!=null){
			$rightEdge = 1;
			while ($mostRight->right!=null&&$mostRight->right!=$cur) {
				$rightEdge++;
				$mostRight = $mostRight->right;
			}
			if($mostRight->right==null){//第一次来到cur
				$mostRight->right = $cur;
				$cur = $cur->left;
				$curlevel++;
				continue;
			}else{//第二次来到cur
				if($cur->left==null){//叶子节点
					$minDepth = min($minDepth,$curlevel);
				}
				$curlevel -= $rightEdge;
				$mostRight->right = null;
				
			}
		}else{//只访问一次的节点
			$curlevel++;
		}		
		$cur = $cur->right;
	}
	$finalDepth = 0;
	$cur = $head;
	while ($cur!=null) {
		$finalDepth++;
		$cur = $cur->right;
	}
	$minDepth = min($minDepth,$finalDepth);
	return $minDepth;
}
