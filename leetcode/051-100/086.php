<?php
/**
 * 分隔链表 中等
 * 给你一个链表和一个特定值 x ，请你对链表进行分隔，使得所有小于 x 的节点都出现在大于或等于 x 的节点之前。

你应当保留两个分区中每个节点的初始相对位置。


示例：

输入：head = 1->4->3->2->5->2, x = 3
输出：1->2->2->4->3->5

 */
class Solution {

    /**
     * @param ListNode $head
     * @param Integer $x
     * @return ListNode
     */
    function partition($head, $x) {
        if (!$head) { return $head; }
        $insert = $node = $vhead = new ListNode(); 
        $vhead->next = $head;
        while($node = $node->next) {
            if ($node->val < $x) { $insert = $node; }
            else {
                while ($node->next && $node->next->val < $x) {
                    $next = $node->next;
                    $node->next = $next->next;
                    $next->next = $insert->next;
                    $insert->next = $next;
                    $insert = $next;
                }
            }
        }
        return $vhead->next;
    }
}
