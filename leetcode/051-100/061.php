<?php
//旋转链表
//将链表每个节点向右移动 k 个位置，其中 k 是非负数。
/*
示例 1:

输入: 1->2->3->4->5->NULL, k = 2
输出: 4->5->1->2->3->NULL
解释:
向右旋转 1 步: 5->1->2->3->4->NULL
向右旋转 2 步: 4->5->1->2->3->NULL
示例 2:

输入: 0->1->2->NULL, k = 4
输出: 2->0->1->NULL
解释:
向右旋转 1 步: 2->0->1->NULL
向右旋转 2 步: 1->2->0->NULL
向右旋转 3 步: 0->1->2->NULL
向右旋转 4 步: 2->0->1->NULL
思路：
1、先计算总长度
2、把尾节点跟头结点成环
3、新链表头部在N-K的位置，N为链表的节点个数。
新链表的尾部在头前面的位置，位于N-K-1位置
当N < K时，K = K%N

注意一下，tmpTail 闭环以后，在内存结构上是直接会对传入的head的末尾节点生效的。所以不需要额外操作

*/
class Solution {

    /**
     * @param ListNode $head
     * @param Integer $k
     * @return ListNode
     */
    function rotateRight($head, $k) {
        if($head==null || $head->next == null) {
            return $head;
        }

        $tmp = $head; //引用,计算链表长度
        for($n=1;$tmp->next != null;$n++){
            $tmp = $tmp->next;
        }
        $tmp->next = $head;
        
        $tmp = $head; //引用
        for($i=0;$i < $n - $k%$n -1 ;$i++){
            $tmp = $tmp->next;
        }

        $new_node = $tmp->next;
        $tmp->next = null;
        return $new_node;
    }
}