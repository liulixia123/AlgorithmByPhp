<?php
/**题目
判断一个链表是否有环
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
	public function hasCycle($head){
		if($L==NULL)
			return false;
        $slow  = $fast = $head;
        while ( $slow!=NULL&&$slow->next!=NULL) {
            $fast=$fast->next->next;
            $slow=$slow->next;
            if($fast==$slow) return true;
        }
		return false;
	}
}
$s = new Solution();
$L11= new ListNode(2);
$L12= new ListNode(4);
$L13= new ListNode(3);

$L21= new ListNode(5);
$L22= new ListNode(6);
$L23= new ListNode(4);
/*$L11= new ListNode(9);
$L12= new ListNode(9);
$L13= new ListNode(9);

$L21= new ListNode(1);*/
$L11->next = $L12;
$L12->next = $L13;
$L21->next = $L22;
$L22->next = $L23;
echo "<pre>";
print_r($s->hasCycle($L11));