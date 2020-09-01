<?php
/**题目
You are given two non-empty linked lists representing two non-negative integers. The digits are
stored in reverse order and each of their nodes contain a single digit. Add the two numbers and
return it as a linked list.
You may assume the two numbers do not contain any leading zero, except the number 0 itself.
Example:
Input: (2 -> 4 -> 3) + (5 -> 6 -> 4)
Output: 7 -> 0 -> 8
Explanation: 342 + 465 = 807.
意思就是2 个逆序的链表，要求从低位开始相加，得出结果也逆序输出，返回值是逆序结果链表的头结点。
解题思路需要注意的是各种进位问题。
极端情况，例如
Input: (9 -> 9 -> 9 -> 9 -> 9) + (1 -> )
Output: 0 -> 0 -> 0 -> 0 -> 0 -> 1
为了处理方法统一，可以先建一个虚拟头结点，这个虚拟头结点的 Next 指向真正的 head，这样
head 不需要单独处理，直接 while 循环即可。另外判断循环终止的条件不用是 p.Next ！= NULL，这样最
后一位还需要额外计算，循环终止条件应该是 p != NULL。
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
	public function addTwoNumbers($L1,$L2){
		if($L1==NULL||$L2==NULL)
			return NULL;
		//创建虚拟头结点
		$pNode = new ListNode(0);
        $pHead = $pNode;
        $val = 0;
		//链表循环判断
		while ($L1 or $L2 or $val){
            if($L1){
                $val += $L1->val;
                $L1 = $L1->next;
            }
            if($L2){
                $val += $L2->val;
                $L2 = $L2->next;
            }
            $pNode->next = new ListNode($val % 10);
            $val /= 10;
            $pNode = $pNode->next;
        }
        return $pHead->next;
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
print_r($s->addTwoNumbers($L11,$L21));