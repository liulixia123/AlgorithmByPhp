<?php
//回文链表
//1->2 false
//1->2->3->2->1 true
//你能否用 O(n) 时间复杂度和 O(1) 空间复杂度解决此题？
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
    function isPalindrome($head) {
        if ($head === null || $head->next === null) return true;
        // 快慢指针，遍历的同时反转链表前半部分
        $fast = $slow = $head;
        $pre = null;
        while ($fast !== null && $fast->next !== null) {
            // 这里的顺序会严重影响结果
            $cur = $slow;
            $fast = $fast->next->next;
            $slow = $slow->next;

            $cur->next = $pre;
            $pre = $cur;
        }

        // 此时 slow 位于右中点
        if ($fast !== null) $slow = $slow->next;

        while ($pre !== null) {
            if ($pre->val != $slow->val) return false;
            $pre = $pre->next;
            $slow = $slow->next;
        }
        return true;

    }
    //
    function isPalindrome1($head) {
        if($head==null||$head->next==null) return true;
        $fast = $slow = $head;
        while ($fast!==null&&$fast->next!==null) {
           $fast = $fast->next->next;//快指针走两步
           $slow = $slow->next;
        }
        //快指针偶数的话还需多走一步
        if($fast) $fast = $fast->next;
        
        $s = [];
        while ($slow) {
            //后半部分压栈
            array_push($s,$slow->val);
            $slow = $slow->next;
        }
       //依次出栈和前部分依次比较是否相等，不想等返回false
        while ($s) {            
            if(array_pop($s)!=$head->val) return false;
            $head = $head->next;
        }
        return true;
    }    
}

$L11= new ListNode(1);
$L12= new ListNode(2);
$L13= new ListNode(2);
$L14= new ListNode(1);
$L15= new ListNode(5);
$L11->next = $L12;
$L12->next = $L13;
$L13->next = $L14;
$L14->next = $L15;
$s = new Solution();
echo "<pre>";
var_dump($s->isPalindrome1($L11));