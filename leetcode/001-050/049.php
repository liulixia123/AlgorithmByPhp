<?php
/**
 * 字母异位词分组
 * 给定一个字符串数组，将字母异位词组合在一起。字母异位词指字母相同，但排列不同的字符串。

示例:

输入: ["eat", "tea", "tan", "ate", "nat", "bat"]
输出:
[
  ["ate","eat","tea"],
  ["nat","tan"],
  ["bat"]
]
说明：
所有输入均为小写字母。
不考虑答案输出的顺序。
 */
class Solution {

    /**
     * @param String[] $strs
     * @return String[][]
     */
    function groupAnagrams($strs) {
    	$map=[];     //哈希查找表
        foreach($strs as $str){
            $arr=str_split($str);//字符串转数组
            sort($arr);
            $pattern=implode('',$arr);//数组转回字符串，这时候已经有序了
            $map[$pattern][]=$str;//存入查找表
        }                

        return $map;
    }
}

$obj = new Solution();
$res = $obj->groupAnagrams(["eat", "tea", "tan", "ate", "nat", "bat"]);
echo "<pre>";
print_r($res);