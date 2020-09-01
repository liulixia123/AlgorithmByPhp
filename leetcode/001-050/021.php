<?php
/**题目
Merge two sorted linked lists and return it as a new list. The new list should be made by splicing
together the nodes of the first two lists.
Example:
Input: 1->2->4, 1->3->4
Output: 1->1->2->3->4->4
意思就是合并 2 个有序链表
解题思路按照题意做即可。。
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
	public function mergeTwoLists($L1,$L2){
		if($L1==NULL)
			return $L2;
        if($L2==NULL)
            return $L1;
		if($L1->val<$L2->val){
            $L1->next = $this->mergeTwoLists($L1->next,$L2);
            return $L1;
        }
        $L2->next =  $this->mergeTwoLists($L1,$L2->next);
        return $L2;
	}
}
$s = new Solution();
$L11= new ListNode(1);
$L12= new ListNode(2);
$L13= new ListNode(4);

$L21= new ListNode(1);
$L22= new ListNode(3);
$L23= new ListNode(4);
$L11->next = $L12;
$L12->next = $L13;
$L21->next = $L22;
$L22->next = $L23;
echo "<pre>";
print_r($s->mergeTwoLists($L11,$L21));