<?php
/**题目
给定一个链表，返回链表开始入环的第一个节点。 如果链表无环，则返回 null。
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
	public function detectCycle($head){
		//先判断是否有环		
		$p = $head;
		$slow  = $fast = $head;
        while (true) {
        	if($slow==NULL&&$slow->next==NULL){
        		return null
        	}
            $fast=$fast->next->next;
            $slow=$slow->next;
            if($fast==$slow) break;
        }
        while($slow != $p){
            $slow = $slow->next;
            $p = $p->next;
        }
        return $p;
		
	}
	public function detectCycle1($head){
		$dummyHead = new ListNode(-1);
        $dummyHead->next = $head;
        $cur1 = $dummyHead;
        $cur2 = $dummyHead;
        //先判断是否有环
        while(true){
            if(null == $cur1->next || null == $cur2->next->next){
                return null;
            }
            $cur1 = $cur1->next;
            $cur2 = $cur2->next->next;
            if($cur1 == $cur2){
                break;
            }
        }
        //从开始头结点遍历，相遇即入口节点
        $cur1 = $dummyHead;
        while($cur1 != $cur2){
            $cur1 = $cur1->next;
            $cur2 = $cur2->next;
        }
        return $cur1;
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
print_r($s->detectCycle($L11));