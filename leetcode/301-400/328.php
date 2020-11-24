<?php
/**题目
奇偶链表
前面放奇数节点后面放偶数节点，注意不是节点的值
输入: 1->2->3->4->5->NULL
输出: 1->3->5->2->4->NULL
输入: 2->1->3->5->6->4->7->NULL 
输出: 2->3->6->7->1->5->4->NULL
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
	public function oddEvenList($head){
		if($head==NULL)
			return NULL;
		//创建两个虚拟头结点
		$dummyHead1 = new ListNode(0);
        $dummyHead2 = new ListNode(0);
        $p1 = $dummyHead1;
        $p2 = $dummyHead2;
        $p = $head;
		//链表循环判断
        $i = 1;
		while ($p){
            if($i&1==1){                
                $p1->next = $p;
                $p = $p->next;
                $p1 = $p1->next;
                $p1->next = NULL;
            }else{
                $p2->next = $p;
                $p = $p->next;
                $p2 = $p2->next;
                $p2->next = NULL;
            }
           
            $i++;
        }
        
        $p1->next = $dummyHead2->next;
        $ret = $dummyHead1->next;
        unset($dummyHead1);
        unset($dummyHead2);
        return $ret;
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
print_r($s->oddEvenList($L11));