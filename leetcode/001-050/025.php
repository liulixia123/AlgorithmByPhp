<?php
/**题目
Given a linked list, reverse the nodes of a linked list k at a time and return its modified list.
k is a positive integer and is less than or equal to the length of the linked list. If the number of
nodes is not a multiple of k then left-out nodes in the end should remain as it is.
Example:
Given this linked list: 1->2->3->4->5
For k = 2, you should return: 2->1->4->3->5
For k = 3, you should return: 3->2->1->4->5

意思就是按照每 K 个元素翻转的⽅式翻转链表。如果不满⾜ K 个元素的就不翻转。
解题思路
这⼀题是 problem 24 的加强版，problem 24 是两两相邻的元素，翻转链表。⽽ problem 25 要求的
是 k 个相邻的元素，翻转链表，problem 相当于是 k = 2 的特殊情况。
使用双指针，start指针指向要反转的区间的第一个元素，end指针指向反转区间的最后一个元素，
有多少个长度为K的区间就反转多少个区间，反转的逻辑用 reverse()函数来实现。
这个慢慢在看一下
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
	public function reverseKGroup($head,$k){
		$res = new ListNode('');
		$res->next = $head;
		$count = 1;
		$start= $head;
		$end= $head;
		//前一个区间的尾节点，用于连接后一个区间
		$pre = NULL;
		while($start != NULL){
            while($end != NULL && $count < $k){
                $end = $end->next;
                $count++;
            }
            //区间长度不足k，一定是最后一个区间，不用反转，直接返回
            if($end == NULL) return $res->next;
            if($start == $head) $res->next = $end;
            $temp = $end->next;
            $cur = $this->reverse($start, $end, $k);
            if($start != $head) $pre->next = $cur;
            $count = 1;
            $pre = $start;
            $start = $temp;
            $end = $temp;
        }
        return $res->next;
	}
	
	public function reverse($start,$end,$k){
		$count = 1;
		$cur = $start;//第一个元素
		$temp1 = $end->next;//最后一个元素
		$temp2 = NULL;
		while ( $count<= $k) {
			$temp2 = $cur->next;
			$cur->next = $temp1;
			$temp1 = $cur;
			$cur = $temp2;
            $count++;
		}
		return $temp1;
	}
}
$s = new Solution();

$L11= new ListNode(1);
$L12= new ListNode(2);
$L13= new ListNode(3);
$L14= new ListNode(4);
$L15= new ListNode(5);

$L11->next = $L12;
$L12->next = $L13;
$L13->next = $L14;
$L14->next = $L15;

echo "<pre>";
print_r($s->reverseKGroup($L11,$k=3));