<?php
/**
 * 删除链表中重复元素
 * 给定一个排序链表，删除所有含有重复数字的节点，只保留原始链表中 没有重复出现 的数字
 * 示例 1:
输入: 1->2->3->3->4->4->5
输出: 1->2->5

示例 2:
输入: 1->1->1->2->3
输出: 2->3

 */
class Solution{
	public function deleteDuplicates($head){
		if($head==null||$head->next==null) return $head;
		$h = new ListNode(-1);
		$h->next = $head;
		$pre = $h;
		$cur = $head;
		while ($cur!=null) {
			$duploicate = "false";
			while($cur->next!=null&&($cur->val ==$cur->next->val)){
				$cur = $cur->next;
				$duploicate = "true";
			}
			if($duploicate=="false"){
				$pre = $cur;
			}else{
				$pre->next = $cur->next; 
			}
			$cur = $cur->next;
		}
		return $h->next;
	}
}
$obj = new Solution();
print_r($obj->deleteDuplicates($head));