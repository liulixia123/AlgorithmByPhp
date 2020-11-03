<?php
//比较两个含有退格的字符串是否相等
/*
示例 1：
输入：S = "ab#c", T = "ad#c"
输出：true
解释：S 和 T 都会变成 “ac”。
示例 2：
输入：S = "ab##", T = "c#d#"
输出：true
解释：S 和 T 都会变成 “”。
示例 3：
输入：S = "a##c", T = "#a#c"
输出：true
解释：S 和 T 都会变成 “c”。
示例 4：
输入：S = "a#c", T = "b"
输出：false
解释：S 会变成 “c”，但 T 仍然是 “b”。
解题思路用栈来解题
 */
class Solution {

    /**
     * @param String $S
     * @param String $T
     * @return Boolean
     */
    function backspaceCompare($S, $T) {
        if($S==$T) return true;
        $arr_s = $arr_t = [];
        for ($i=0; $i < max(strlen($S),strlen($T)); $i++) { 
        	if(isset($S[$i])){
        		if($S[$i]!='#'){
        			array_push($arr_s,$S[$i]);
	        	}else{
	        		array_pop($arr_s);
	        	}
        	}
        	if(isset($T[$i])){
	        	if($T[$i]!='#'){
	        		array_push($arr_t,$T[$i]);
	        	}else{
	        		array_pop($arr_t);
	        	}
	        }
        }
        if($arr_s==$arr_t){
        	return true;
        }else{
        	return false;
        }
    }
}