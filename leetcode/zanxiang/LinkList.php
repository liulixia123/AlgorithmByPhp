<?php
/**
 * 链表快慢指针找到中点，上中点，中点前一个，上中点前一个
 */
class ListNode{
	public $val;
	public $next;	
	public function __construct($val){
		$this->val = $val;
		$this->next = null;
	}
}
// 中点或上中点
function midOrUpNode($head){
	if($head==null||$head->next==null||$head->next->next==null){
		return $head;
	}
	$slow = $head->next;
	$fast = $head->next->next;
	while ($fast->next!=null&&$fast->next->next!=null) {
		$slow = $slow->next;
		$fast = $fast->next->next;
	}
	return $slow;
}
// 中点或下中点
function midOrDownNode($head){
	if($head==null||$head->next==null){
		return $head;
	}
	$slow = $head->next;
	$fast = $head->next;
	while ($fast->next!=null&&$fast->next->next!=null) {
		$slow = $slow->next;
		$fast = $fast->next->next;
	}
	return $slow;
}
// 中点或上中点前一个
function midOrUpBeforeNode($head){
	if($head==null||$head->next==null||$head->next->next==null){
		return null;
	}
	$slow = $head;
	$fast = $head->next->next;
	while ($fast->next!=null&&$fast->next->next!=null) {
		$slow = $slow->next;
		$fast = $fast->next->next;
	}
	return $slow;
}
// 中点或下中点前一个
function midOrDownBeforeNode($head){
	if($head==null||$head->next==null){
		return null;
	}
	$slow = $head;
	$fast = $head->next;
	while ($fast->next!=null&&$fast->next->next!=null) {
		$slow = $slow->next;
		$fast = $fast->next->next;
	}
	return $slow;
}