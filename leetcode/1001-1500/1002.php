<?php
/*
查找常用字符
给定仅有小写字母组成的字符串数组 A，返回列表中的每个字符串中都显示的全部字符（包括重复字符）组成的列表。例如，如果一个字符在每个字符串中出现 3 次，但不是 4 次，则需要在最终答案中包含该字符 3 次。

你可以按任意顺序返回答案。

示例 1：

输入：["bella","label","roller"]
输出：["e","l","l"]
示例 2：

输入：["cool","lock","cook"]
输出：["c","o"]


 */
class Solution {

    /**
     * @param String[] $A
     * @return String[]
     */
    public function commonChars($A) {
        $arr=[];
        $len=sizeof($A);
        foreach($A as $item){
            $temp1=str_split($item);
            $temp2=array_count_values($temp1);            
            foreach($temp2 as $k=>$v){
                if(isset($arr[$k])){
                    $arr[$k]=[min($arr[$k][0],$v),$arr[$k][1]+1];
                }else{
                    $arr[$k]=[$v,1];
                }
            }
        }
        $ret=[];
        foreach($arr as $k=>$v){
            if($v[1]==$len){
                for($i=0;$i<$v[0];$i++){
                    $ret[]=$k;
                }
            }
        }

        return $ret; 
    }
    public function commonChars1($A){
    	if (empty($A)) {
            return [];
        }
        $count = count($A);
        $out = [];
        $str = $A[0];
        $strLen = strlen($str);
        for ($i=0;$i<$strLen;$i++){
            $num = 1;
            $value = $str[$i];
            for ($j=1;$j<$count;$j++) {
                if (strpos($A[$j], $value) !== false) {
                    $num++;
                    $index = strpos($A[$j], $value);
                    $A[$j] = substr($A[$j], 0, $index) . substr($A[$j], $index + 1, strlen($A[$j]));
                }
            }     
            if ($num % $count == 0) {
                $out[] = $value;
            }
        }
        return $out;
    }
}

$s = new Solution();
echo "<pre>";
var_dump($s->commonChars1(["cool","lock","cook"]));