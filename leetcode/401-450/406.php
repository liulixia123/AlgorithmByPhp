<?php
/**
 * 根据身高重建队列
 * 假设有打乱顺序的一群人站成一个队列。 每个人由一个整数对(h, k)表示，其中h是这个人的身高，k是排在这个人前面且身高大于或等于h的人数。 编写一个算法来重建这个队列。

注意：
总人数少于1100人。

示例

输入:
[[7,0], [4,4], [7,1], [5,0], [6,1], [5,2]]

输出:
[[5,0], [7,0], [5,2], [6,1], [4,4], [7,1]]
解题思路：贪心算法
1.排序：
按高度降序排列。
在同一高度的人中，按 k 值的升序排列。
2.逐个地把它们放在输出队列中，索引等于它们的 k 值。
3.返回输出队列
 */
class Solution {

    /**
     * @param Integer[][] $people
     * @return Integer[][]
     * 先按身高降序排列在按K升序
     */
    function reconstructQueue($people) {
        $ans = [];
	    usort($people, function($a, $b){
	        if($a[0] > $b[0]){
	            return -1;
	        }else if($a[0] < $b[0]){
	            return 1;
	        }else{
	            return $a[1] > $b[1] ? 1 : -1;
	        }
	    });
	    //print_r($people);
	    $list = new SplDoublyLinkedList();//双端链表
	    foreach($people as $p){
	        // 把p加到p[1]下标为右边数的位置
	        // 高个子先站好位， 矮个子插入到k位置上， 前面肯定有k个高个子，矮个子再插到前面也 满足k的要求
	        $list->add($p[1], $p);//按照K来升序排列
	    }
	    //print_r($list);
	    // 返回新数组，注意设置长度 几行2列   
	    foreach($list as $val){
	        $ans[] = $val;
	    }  
	    return $ans;
    }
}
$s = new Solution();
echo "<pre>";
var_dump($s->reconstructQueue([[7,0], [4,4], [7,1], [5,0], [6,1], [5,2]]));

$a = new \SplDoublyLinkedList;

if ($a instanceof \SplDoublyLinkedList) {
    $a->add(0, 'Paulus');
    $a->add(1, 'Gandung');
    $a->add(0, 'Prakosa');

    // then, iterate over that because \SplDoublyLinkedList
    // is implementing \Iterator interface.
    foreach ($a as $value) {
        echo sprintf("%s\n", $value);
    }
}