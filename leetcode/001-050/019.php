<?php
/**题目
Given a linked list, remove the n-th node from the end of list and return its head.
Example:
Given linked list: 1->2->3->4->5, and n = 2.
After removing the second node from the end, the linked list becomes 1->2->3-
>5.
意思就是删除链表中倒数第 n 个结点。
解题思路这道题比较简单，先循环⼀次拿到链表的总⻓度，然后循环到要删除的结点的前⼀个结点开始删除操
作。需要注意的一个特例是，有可能要删除头结点，要单独处理。
这道题有⼀种特别简单的解法。设置 2 个指针，一个指针距离前一个指针 n 个距离。同时移动 2 个指
针，2 个指针都移动相同的距离。当一个指针移动到了终点，那么前一个指针就是倒数第 n 个节点了。
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
	public function removeNthFromEnd($L,$n){
		if($L==NULL)return 0;
        if($n<=0) return $L;
        $fast= $slow= $L;
        for ($i=0; $i <$n ; $i++) { 
           $fast= $fast->next;
        }
        if($fast==NULL){
           $L = $L->next;
           return $L; 
        }
        while ($fast->next!=NULL) {
           $fast = $fast->next;
           $slow = $slow->next;
        }
        $slow->next = $slow->next->next;
        return $L;
	}
}
$s = new Solution();
$L11= new ListNode(2);
$L12= new ListNode(3);
$L13= new ListNode(4);
$L14= new ListNode(5);
$L15= new ListNode(6);

$L11->next = $L12;
$L12->next = $L13;
$L13->next = $L14;
$L14->next = $L15;

echo "<pre>";
print_r($s->removeNthFromEnd($L11,2));