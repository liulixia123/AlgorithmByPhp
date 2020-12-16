<?php

class ListNode{
	public $val;
	public $next;
	public $rand;
	public function __construct($val){
		$this->val = $val;
		$this->next = null;
		$this->rand = null;
	}
}
// 复制链表带随机节点
function copyList($head){
	$cur = $head;
	if($head==null&&$head->next==null){
		return new ListNode($head->val);
	}
	//复制节点并连在一起
	$next = null;
	while ($cur!=null) {		
		$next = $cur->next;
		$cur->next = new ListNode($cur->val);
		$cur->next->next = $next;
		$cur = $next;
		
	}
	//随机节点指针
	$cur = $head;
	$curCopy = null;
	while($cur!=null){
        $next = $cur->next->next;
        $curCopy = $cur->next;
        $curCopy->rand = $cur->rand != null?$cur->rand->next:null;
        $cur = $next;
    }
    //分离
    $res = $head->next;
    $cur = $head;
    while ($cur!=null) {
    	$next = $cur->next->next;
    	$curCopy = $cur->next;
    	$cur->next = $next;
    	$curCopy->next = $next!=null?$next->next:null;
    	$cur = $next;
    }
    return $res;
}

$l1 = new ListNode(1);
$l2 = new ListNode(2);
$l3 = new ListNode(3);
$l1->next = $l2;
$l2->next = $l3;
$l1->rand = $l3;
$l2->rand = $l1;
var_dump(copyList($l1));