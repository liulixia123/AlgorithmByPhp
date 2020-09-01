<?php
/**题目
Merge k sorted linked lists and return it as one sorted list. Analyze and describe its complexity
Example:
Input:
[
 1->4->5,
 1->3->4,
 2->6
]
Output: 1->1->2->3->4->4->5->6
意思就是合并 K 个有序链表
解题思路
借助分治的思想，把 K 个有序链表两两合并即可。相当于是第 21 题的加强版。
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
	public function mergeKLists($L){
		if(empty($L)) return ;
		$len = count($L);
		if($len==1){
			return $L[0];
		}		
		$middle = intval($len/2);
		for ($i=0; $i < $middle; $i++) { 
			$leftL[] = $L[$i];
		}
		for ($j=$middle; $j < $len; $j++) { 
			$rightL[] = $L[$j];
		}
		$left =  $this->mergeKLists($leftL);
		$right =  $this->mergeKLists($rightL);
		return $this->mergeTwoLists($left,$right);
	}
	public function mergeTwoLists($L1,$L2){
		if($L1==NULL)
			return $L2;
        if($L2==NULL)
            return $L1;
		if($L1->val<$L2->val){
            $L1->next = $this->mergeTwoLists($L1->next,$L2);
            return $L1;
        }
        $L2->next =  $this->mergeTwoLists($L1,$L2->next);
        return $L2;
	}
}
$s = new Solution();
$L11= new ListNode(1);
$L12= new ListNode(4);
$L13= new ListNode(5);

$L21= new ListNode(1);
$L22= new ListNode(3);
$L23= new ListNode(4);

$L31= new ListNode(2);
$L32= new ListNode(6);

$L11->next = $L12;
$L12->next = $L13;
$L21->next = $L22;
$L22->next = $L23;
$L31->next = $L32;
$L = [$L11,$L21,$L31];
echo "<pre>";
print_r($s->mergeKLists($L));