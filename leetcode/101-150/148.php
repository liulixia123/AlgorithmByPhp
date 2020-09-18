<?php
/*
排序链表
在 O(n log n) 时间复杂度和常数级空间复杂度下，对链表进行排序。

示例 1:

输入: 4->2->1->3
输出: 1->2->3->4
示例 2:

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

    function sortList($head) {
        if($head==null){return $head;}
        return $this->mergeSort($head);
    }

    public function mergeSort($head) {
                //回归条件
        if ($head->next == null) {
            return $head;
        }
        //快指针,考虑到链表为2时的情况，fast比slow早一格
        $fast = $head->next;
        //慢指针
        $slow = $head;

        //快慢指针开跑
        while ($fast != null && $fast->next != null) {
            $fast = $fast->next->next;
            $slow = $slow->next;
        }
        
        //找到右子链表头元素
        $tail = $slow->next;
        //将中点后续置空，切割为两个子链表
        $slow->next=null;
        //递归分解左子链表,得到新链表起点
        $head=$this->mergeSort($head);
        //递归分解右子链表,得到新链表起点
        $tail=$this->mergeSort($tail);
        
        //并归两个子链表
        return $this->merge($head, $tail);
    }
    
    private function merge($l1, $l2) {
        $sentry = new ListNode(-1);
        $curr = $sentry;

        while ($l1 != null && $l2 != null) {
            if ($l1->val < $l2->val) {
                $curr->next = $l1;
                $l1 = $l1->next;
            } else {
                $curr->next = $l2;
                $l2 = $l2->next;
            }

            $curr = $curr->next;
        }

        $curr->next = $l1 != null ? $l1 : $l2;
        return $sentry->next;
    }

    function sortList1($head){
    	if($head==null) return null;
    	if($head->next==null) return $head;
    	$arr = [];
    	$p = $head;
    	while($p){
    		$arr[] = $p->val;
    		$p=$p->next;
    	}
    	sort($arr);
    	$p = $head;
    	$i = 0;
    	while ($p) {
    		$p->val = $arr[$i++];
    		$p = $p->next;
    		# code...
    	}
        return $head;
    }

}
$s = new Solution();
$L11= new ListNode(4);
$L12= new ListNode(2);
$L13= new ListNode(1);
$L14= new ListNode(3);

$L11->next = $L12;
$L12->next = $L13;
$L13->next = $L14;
echo "<pre>";
print_r($s->sortList1($L11));