<?php
/**
 * 反转字符串的元音字母
 * 编写一个函数，以字符串作为输入，反转该字符串中的元音字母。

示例 1:

输入: “hello”
输出: “holle”
 */
class Solution {
	function reverseVowels($s){
		$map = ["A","E","I","O","U","a","e","i","o",'u'];
		if($s=='') return $s;
		//设置头尾指针
		$head = 0;
		$tail = strlen($s)-1;
		$res = [];
		$set = array_flip($map);
		while($head<=$tail) { 
			$ch = $s[$head];
			$ct = $s[$tail];
			if(!array_key_exists($ch,$set)){
				$res[$head] = $ch;
				$head++;
			}elseif(!array_key_exists($ct,$set)){
				$res[$tail] = $ct;
				$tail--;
			}else{
				$res[$head] = $ct;
				$head++;
				$res[$tail] = $ch;
				$tail--;
			}
		}
		$str = '';
		for ($i=0; $i < strlen($s); $i++) { 
			$str.=$res[$i];
		}
		return $str;
	}
}
$s = new Solution();
echo "<pre>";
print($s->reverseVowels('hello'));