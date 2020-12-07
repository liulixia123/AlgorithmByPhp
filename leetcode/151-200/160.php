<?php
//相交链表
//编写一个程序，找到两个单链表相交的起始节点。
//注意：

/*如果两个链表没有交点，返回 null.
在返回结果后，两个链表仍须保持原有的结构。
可假定整个链表结构中没有循环。
程序尽量满足 O(n) 时间复杂度，且仅用 O(1) 内存。
*/

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
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
    //先判断两个链表是否相交，不相交直接返回NULL，相交求交点
    function getIntersectionNode($headA, $headB) {
        if($headA == null || $headB == null){
            return null;
        }
        //先判断是否相交，不相交直接返回
        if(!$this->isIntersect($headA, $headB)){
            return null;
        }
        //若相交再找交叉点：分别遍历，并指向另一链表的头，这样遍历的长度相等
        //分别遍历出两个链表长度
        $cura = $headA;
        $curb = $headB;
        $Alen = headLen($headA);
        $Blen = headLen($headB);        
        $len = $Alen-$Blen;
        while($len>0){
            //A链表先走len步在比较
            $cura = $cura->next;
            $len--;
        }
        while($len<0){
            //B链表先走len步在和A比较
            $curb = $curb->next;
            $len++;
        }        
        while($cura || $curb){
            if($cura === $curb){
                break;
            }
            $cura = $cura->next;
            $curb = $curb->next;
        }
        return $cura;
    }
    //判断是否相交
    function isIntersect($headA, $headB){
        if($headB == null || $headB == null){
            return false;
        }
        while($headA->next != null){
            $headA = $headA->next;
        }
        while($headB->next != null){
            $headB = $headB->next;
        }
        return $headA === $headB;
    }
    //计算链表长度
    function headLen($head){
        $len = 1;
        while($head->next != null){
            $head = $head->next;
            $len++;
        }
        return $len;
    }
}
$s = new Solution();
$L11= new ListNode(4);
$L12= new ListNode(1);
$L13= new ListNode(8);
$L14= new ListNode(4);
$L15= new ListNode(5);
$L21= new ListNode(5);
$L22= new ListNode(0);
$L23= new ListNode(1);
/*$L11= new ListNode(9);
$L12= new ListNode(9);
$L13= new ListNode(9);

$L21= new ListNode(1);*/
$L11->next = $L12;
$L12->next = $L13;
$L13->next = $L14;
$L14->next = $L15;
$L21->next = $L22;
$L22->next = $L23;
$L23->next = $L13;

echo "<pre>";
print_r($s->getIntersectionNode($L11,$L21));