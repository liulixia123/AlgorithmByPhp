<?php
/**
 * 重构字符串
 * 给定一个字符串S，检查是否能重新排布其中的字母，使得两相邻的字符不同。

若可行，输出任意可行的结果。若不可行，返回空字符串。

示例 1:
输入: S = "aab"
输出: "aba"
示例 2:
输入: S = "aaab"
输出: ""

 */
class Solution {

    /**
     * @param String $S
     * @return String
     */
    function reorganizeString($S) {
        if($S=="") return "";
        if(strlen($S)==1) return $S;
        $hp = 0;
        $cand = 0;
        $len = strlen($S);
        $res = "";
        for ($i=0; $i < $len; $i++) { 
        	if($hp==0){
        		$hp=1;
        		$cand = $S[$i];
        	}elseif($cand==$S[$i]){
        		$hp++;
        	}else{
        		$hp--;
        		$res.=$S[$i].$cand;
        	}
        }
        if($hp>1) return "";
        return ($hp==0)?$res:$res.$cand;
    }
    // 奇偶位置放元素
    function reorganizeString1($S){
    	$total = strlen($S);

        $stat = [];
        for ($i=0; $i < $total; $i++) { 
            if (!isset($stat[$S[$i]])) {
                $stat[$S[$i]] = 1;
            } else {
                $stat[$S[$i]]++;
            }
        }
        arsort($stat);
        reset($stat);
        $first = current($stat);
        if ($first > ceil($total / 2)) {
            return '';
        }

        $k = 0;
        foreach ($stat as $s => $num) {
            while ($num > 0) {
                $S[$k] = $s;
                $num--;
                $k += 2;
                if ($k >= $total) {
                    $k = 1;
                }
            }
        }

        return $S;
    }
}

$obj = new Solution();
$S = "baaba";
var_dump($obj->reorganizeString1($S));