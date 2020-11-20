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
	/**
	 * 动态规划求解，高级解法
	 * @param  [type] $s [description]
	 * @return [type]    [description]
	 * 子问题
	 * i 和j 表示回文开始和结束位置
	 * s[i,j] 是回文那么s[i+1,j-1] 也是回文
	 */
	function longestPalindrome1($s){
		$length = strlen($s);
		if($length<2) return $s;
		$dp = [];
		//$dp = array_fill(0, $length, 1);
		$left = $right = 0;
		for ($i=$length-2; $i >=0; $i--) { 
			$dp[$i][$i] =true;
			for ($j=$i+1; $j < $length; $j++) { 				
				$dp[$i][$j] = $s[$i]==$s[$j]&&(($j-$i)<3||$dp[$i+1][$j-1]);
				if($dp[$i][$j]&&$right-$left<$j-$i){
					$left = $i;
					$right = $j;
				}
			}
		}
		return substr($s,$left,$right);
	}
}
$s = new Solution();
print_r($s->longestPalindrome1("babad"));