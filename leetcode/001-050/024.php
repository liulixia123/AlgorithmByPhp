<?php
/**题目
Given a linked list, swap every two adjacent nodes and return its head.
You may not modify the values in the list's nodes, only nodes itself may be changed.
Example:
Given 1->2->3->4, you should return the list as 2->1->4->3.

意思就是两两相邻的元素，翻转链表
解题思路
按照题意做即可。
*/
class ListNode{
	public $val;
	public $next;
	public function __construct($val){
		$this->val = $val;
		$this->next = NULL;
	}
}
class Solution{
	//迭代方式实现
	public function swapPairs($head){
		$res = new ListNode('');
		$res->next = $head;
		//在循环中移动的节点
		$cur = $res;
		while ( $head->next!=NULL&&$head!=NUll) {
			//创建两个节点
			$first = $head;
			$second = $head->next;
			//交换两个节点
			$cur->next = $second;
			$first->next = $second->next;
			$second->next = $first;
			//交换结束，移动至下一个交换点
			$cur = $first;
			$head = $first->next;
		}
		return $res->next;	
		
	}
	//递归方式实现不是很理解
	public function swapPairs1($head){
		if($head==NULL||$head->next==NULL) return $head;
		$res = $head->next;
		$n = $res->next;
		$head->next = $this->swapPairs1($n);
		$res->next = $head;
		return $res;

	}
}
$s = new Solution();

$L11= new ListNode(1);
$L12= new ListNode(2);
$L13= new ListNode(3);
$L14= new ListNode(4);

$L11->next = $L12;
$L12->next = $L13;
$L13->next = $L14;

echo "<pre>";
print_r($s->swapPairs1($L11));