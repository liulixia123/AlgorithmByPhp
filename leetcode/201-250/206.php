<?php
//反转链表
//用递归和迭代两种方式实现
//1->2->3->4->5->null
//5->4->3->2->1->null
class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val) { $this->val = $val; }
}
class Solution {
    /**
     * @param ListNode $headA
     * @param ListNode $headB
     * @return ListNode
     */
    //
    function reverseList($head) {
        if($head == null||$head->next==null){
            return $head;
        }
        $last = $this->reverseList($head->next);
        $head->next->next = $head;
        $head->next = null;
        return $last;
    }
    function reverseList1($head){
        $prev = null;
        $cur = $head;
        while ($cur) {
            $next = $cur->next;
            $cur->next = $prev;
            $prev = $cur;
            $cur = $next;
        }

        return $prev;
    }
    
}

$L11= new ListNode(1);
$L12= new ListNode(2);
$L13= new ListNode(3);
$L14= new ListNode(4);
$L15= new ListNode(5);
$L11->next = $L12;
$L12->next = $L13;
$L13->next = $L14;
$L14->next = $L15;

$s = new Solution();
echo "<pre>";
print_r($s->reverseList($L11));