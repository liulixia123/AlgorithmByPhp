<?php
/**题目
最长回文子串
输入: "babad"
输出: "bab"
注意: "aba" 也是一个有效答案。
输入: "cbbd"
输出: "bb"
*/

class Solution{
	public function longestPalindrome($s){
		$length = strlen($s);
		if($length<2) return $s;
		$maxlen = 1;
		$begin=0;
		for ($i=0; $i < $length; $i++) { 
			for ($j=$i+1; $j < $length; $j++) { 
				if($j-$i+1>$maxlen&&$this->validPalidrome($s,$i,$j))
				{
					$maxlen = $j-$i+1;
					$begin = $i;
				}
			}
		}
		return substr($s,$begin,$maxlen);
	}
	private function validPalidrome($s,$left,$right){
		while ( $left<= $right) {
			if($s[$left]!=$s[$right])
				return false;
			$left++;$right--;
		}
		return true;
	}
}
$s = new Solution();
print_r($s->longestPalindrome("cbbd"));