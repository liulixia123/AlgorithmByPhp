<?php
/**
 * 计算表达式运算结果（困难）
 * 实现一个基本的计算器来计算一个简单的字符串表达式的值。

字符串表达式可以包含左括号 ( ，右括号 )，加号 + ，减号 -，非负整数和空格  。

示例 1:
输入: "1 + 1"
输出: 2
示例 2:
输入: " 2-1 + 2 "
输出: 3
示例 3:
输入: "(1+(4+5+2)-3)+(6+8)"
输出: 23

 */
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function calculate($s) {
    	$res = $this->getValue($s,0);
    	return $res[0];
    }

    function getValue($s,$i){
    	$pre = 0;
    	$queue = [];
    	while($i<strlen($s)&&trim($s[$i])!=')') { 
    		if($s[$i]==' '){
    			$i++; 			
    			continue;    			
    		}
    		if($s[$i]>'0'&&$s[$i]<='9'){
    			$pre = $pre*10+intval($s[$i++]);
    		}elseif($s[$i]!='('){
    			array_push($queue,$pre);
    			array_push($queue,$s[$i++]);    			
    			$pre = 0;
    		}else{
    			$bar = $this->getValue($s,$i+1);
    			$pre = $bar[0];
    			$i = $bar[1]+1;
    		}
    	}
    	array_push($queue,$pre);
    	return [$this->getNum($queue),$i];
    }
    function addNum($queue,$pre){
    	array_push($queue,$pre);
    	return $queue;
    }
    function getNum($stack){    	   	
    	while (count($stack)!=1) {
			$t1 = array_pop($stack);
			$t2 = array_pop($stack);
			switch ($t2) {
				case '+':
					$t3 = array_pop($stack);
					array_push($stack,$t3+$t1);
					break;
				case '-':
					$t3 = array_pop($stack);
					array_push($stack,$t1-$t3);
					break;
				case '*':
					$t3 = array_pop($stack);
					array_push($stack,$t3*$t1);
					break;
				case '/':
					$t3 = array_pop($stack);
					array_push($stack,intval($t1/$t3));
					break;
				default:
					# code...
					break;
			}
		}
		return array_pop($stack);
    }
}
$obj = new Solution();
echo $obj->calculate("3 + 2*2");