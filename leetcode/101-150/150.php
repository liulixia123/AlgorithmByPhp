<?php
/**
 * 逆波兰表达式求值
 * 逆波兰表达式是对于四则运算问题的经典解法。
 */
class Solution {
	function evalRPN($tokens){
		$n = count($tokens);
		$i = 0;
		$stack = [];
		$oper = ["+","-","*","/"];
		while ($i<$n) {
			if(in_array($tokens[$i],$oper)){
				$t1= array_pop($stack);
				$t2= array_pop($stack);
				switch ($tokens[$i]) {
					case '+':
						array_push($stack,$t1+$t2);
						break;
					case '-':
						array_push($stack,$t2-$t1);
						break;
					case '*':
						array_push($stack,$t1*$t2);
						break;
					case '/':
						array_push($stack,intval($t2/$t1));
						break;
					default:
						# code...
						break;
				}
			}else{
				array_push($stack,$tokens[$i]);
			}
			++$i;
			
		}
		return array_pop($stack);
	}
}

$s = new Solution();
echo "<pre>";
$tokens = ["10", "6", "9", "3", "+", "-11", "*", "/", "*", "17", "+", "5", "+"];
var_dump($s->evalRPN($tokens));