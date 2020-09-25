<?php
/**题目
按照指定规则重新排序链表：第一个元素和最后一个元素排列在一起，接着第二个元素和倒数第二个元
素排在一起，接着第三个元素和倒数第三个元素排在一起。
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
	public function reorderList($head){
		//单链表求解
        if($head==null||$head->next==null) return $head;
        $slow = $fast = $head;
        //找到链表的中间节点
        while ($fast->next!=null&&$fast->next->next!=null) {
            $slow = $slow->next;
            $fast = $fast->next;
        }
        //反转链表后半部分
        $preMiddle = $slow;
        $preCurrent = $slow->next;
        while ($preCurrent->next!=null) {
            $current = $preCurrent->next;
            $preCurrent->next = $current->next;
            $current->next = $preMiddle->next;
            $preMiddle->next = $current;
        }
        //重新组合链表
        $p1 = $head;
        $p2 = $preMiddle->next;
        while($p1 != $preMiddle) {
            $preMiddle->next = $p2->next;
            $p2->next = $p1->next;
            $p1->next = $p2;
            $p1 = $p2->next;
            $p2 = $preMiddle->next;
         }
         return $head;
		
	}	
}
$s = new Solution();
$L11= new ListNode(2);
$L12= new ListNode(4);
$L13= new ListNode(3);
$L14= new ListNode(5);

$L21= new ListNode(5);
$L22= new ListNode(6);
$L23= new ListNode(4);
/*$L11= new ListNode(9);
$L12= new ListNode(9);
$L13= new ListNode(9);

$L21= new ListNode(1);*/
$L11->next = $L12;
$L12->next = $L13;
$L13->next = $L14;
$L21->next = $L22;
$L22->next = $L23;
echo "<pre>";
print_r($s->reorderList($L11));