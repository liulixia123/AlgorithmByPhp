<?php
/**
 * 对链表进行插入排序
 * 
插入排序的动画演示如上。从第一个元素开始，该链表可以被认为已经部分排序（用黑色表示）。
每次迭代时，从输入数据中移除一个元素（用红色表示），并原地将其插入到已排好序的链表中。

插入排序算法：

插入排序是迭代的，每次只移动一个元素，直到所有元素可以形成一个有序的输出列表。
每次迭代中，插入排序只从输入数据中移除一个待排序的元素，找到它在序列中适当的位置，并将其插入。
重复直到所有输入数据插入完为止。
示例 1：

输入: 4->2->1->3
输出: 1->2->3->4
示例 2：

输入: -1->5->3->4->0
输出: -1->0->3->4->5

 */
class ListNode{
	public $val;
	public $next;
	public function __construct($val){
		$this->val = $val;
		$this->next = NULL;
	}
}
class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     * 辅助链表求解
     */
    function insertionSortList($head) {
    	if($head==null||$head->next==null) return $head;
    	$pre = new ListNode(-1);
    	$ans = $pre;
    	$cur = $head;
    	while ($cur!=null) {
    		$pre = $ans;
    		//当pre.next.val大于cur.val时停止循环
    		while($pre->next!=null&&$pre->next->val<$cur->val){
    			$pre= $pre->next;
    		}
    		 //保存原链表当前节点的下一节点
    		$tmp = $cur->next;
    		//把cur插入到pre之后
    		$cur->next = $pre->next;
    		$pre->next = $cur;
    		//cur指针后移一位
    		$cur = $tmp;
    	}
    	return $ans->next;
    }
}