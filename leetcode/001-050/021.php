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
	public function mergeTwoLists($l1, $l2){
		if($l1==NULL)
			return $l2;
        if($l2==NULL)
            return $l1;
		if($l1->val<$l2->val){
            $l1->next = $this->mergeTwoLists($l1->next,$l2);
            return $l1;
        }
        $l2->next =  $this->mergeTwoLists($l1,$l2->next);
        return $l2;
	}
}
$s = new Solution();
$l11= new ListNode(1);
$l12= new ListNode(2);
$l13= new ListNode(4);

$l21= new ListNode(1);
$l22= new ListNode(3);
$l23= new ListNode(4);
$l11->next = $l12;
$l12->next = $l13;
$l21->next = $l22;
$l22->next = $l23;
echo "<pre>";
print_r($s->mergeTwoLists($l11,$l21));