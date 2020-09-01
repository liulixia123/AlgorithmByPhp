<?php
/**题目
Implement strStr().
Return the index of the first occurrence of needle in haystack, or -1 if needle is not part of
haystack.
Example 1:
Input: haystack = "hello", needle = "ll"
Output: 2
Example 2:
Input: haystack = "aaaaa", needle = "bba"
Output: -1
意思就是实现一个查找 substring 的函数。如果在字符串中找到了子串，返回子串在字符串中出现的下标，如果没有
找到，返回 -1，如果子串是空串，则返回 0 。
解题思路
这题比较简单，直接写即可。KMP和暴力解法
*/

class Solution{
	public function strStr($haystack,$needle){
		if($needle=='') return 0;
		if($haystack=="") return 0;
		$haystacklen = strlen($haystack);
		$needlelen = strlen($needle);
		$nextval = [];
		$this->getNext($needle,$nextval);
        $i=0;$j=0;
        while($i<$haystacklen&&$j<$needlelen){
            if($j==-1||$haystack[$i]==$needle[$j]){
                $i++;$j++;
            }else{
                $j=$nextval[$j];
            }
        }
        if($j>=$needlelen) return $i-$needlelen;
        else return -1;

	}
	public function getNext($needle,&$nextval){
		$needlelen = strlen($needle);
     	$i=1;$j=0;$nextval[0]=-1;//这个地方比较容易写错，要注意一下边界值
	    while($i<$needlelen){
	        if($j==-1||$needle[$i]==$needle[$j]){
	             $i++;$j++;
	             if($i>=$needlelen)break;
	             if($needle[$i]==$needle[$j])$nextval[$i]=$nextval[$j];
	                 else $nextval[$i]=$j;
	        }else{
	             $j=$nextval[$j];
	        }
	    }
 	}
}
$s = new Solution();
print_r($s->strStr('aaaaa','ll'));