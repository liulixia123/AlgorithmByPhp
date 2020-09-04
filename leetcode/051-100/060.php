<?php
/**题目
给出集合 [1,2,3,…,n]，其所有元素共有 n! 种排列。
按大小顺序列出所有排列情况，并⼀⼀标记，当 n = 3 时, 所有排列如
下："123"，"132"，"213"，"231"，"312"，"321"，给定 n 和 k，返回第 k 个排列。
Input: n = 3, k = 3
Output: "213"
Input: n = 4, k = 9
Output: "2314"
Explanation: [4,-1,2,1] has the largest sum = 6.
DFS
*/

class Solution{
	private $visited = [];
	public function getPermutation($n,$k){
		if($k==0) return '';
		// 将 n! 种排列分为：n 组，每组有 (n - 1)! 种排列
		return  $this->recursive($n,$this->factorial($n-1),$k);
	}
	/**
	 * n 剩余数字个数，逐次递减
	 * f 是每组排列个数
	 */
	private function recursive($n,$f,$k){
		$offset =$k%$f;// 组内偏移量
		$groupindex = intval($k/$f)+($offset>0?1:0);//第几组
		// 在没有被访问的数字里找第 groupIndex 个数字
        $i = 0;  
        for(; $i < $n && $groupindex >0; $i++){
            if(!$this->visited[$i]){
                $groupindex--;
            }
        }

        $this->visited[$i-1] = true;// 标记为已访问
        if($n - 1 > 0){
            // offset = 0 时，则取第 i 组的第 f 个排列，否则取第 i 组的第 offset 个排列
            return strval($i) . $this->recursive($n-1, intval($f/($n - 1)), $offset == 0 ? $f : $offset);
        }else{
            // 最后一数字
            return strval($i);
        }
	}
	//求n!
	private function factorial($n){
		$res = 1;
        for($i = $n; $i >=1; $i--){
            $res *= $i;
        }
        return $res;
	}
}
$s = new Solution();
echo "<pre>";
print_r($s->getPermutation(3,3));